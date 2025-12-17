<?php
// Set headers to allow access from the browser
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dbFile = 'db.json';

function readDb() {
    global $dbFile;
    if (!file_exists($dbFile)) return ["users" => [], "cds" => [], "transactions" => []];
    return json_decode(file_get_contents($dbFile), true);
}

function writeDb($data) {
    global $dbFile;
    file_put_contents($dbFile, json_encode($data, JSON_PRETTY_PRINT));
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);
$action = isset($_GET['action']) ? $_GET['action'] : '';

// 1. LOGIN
if ($method === 'POST' && $action === 'login') {
    $db = readDb();
    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';
    
    foreach ($db['users'] as $u) {
        if ($u['username'] === $username && isset($u['password']) && $u['password'] === $password) {
            echo json_encode(["success" => true, "user" => $u]);
            exit;
        }
    }
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
    exit;
}

// 2. REGISTER (Updated with Role Selection)
if ($method === 'POST' && $action === 'register') {
    $db = readDb();
    $username = $input['username'];
    $role = $input['role'] ?? 'member'; // Default to member if not sent
    
    // Validate role
    if ($role !== 'member' && $role !== 'guest') {
        $role = 'member';
    }

    foreach ($db['users'] as $u) {
        if ($u['username'] === $username) {
            echo json_encode(["success" => false, "message" => "Username already exists"]);
            exit;
        }
    }

    // Set limits based on role
    $maxCds = ($role === 'guest') ? 2 : 5;

    $newUser = [
        "id" => time(),
        "username" => $username,
        "password" => $input['password'],
        "name" => $input['name'],
        "role" => $role,
        "maxCds" => $maxCds
    ];

    $db['users'][] = $newUser;
    writeDb($db);
    echo json_encode(["success" => true, "message" => "Registration successful! Please login."]);
    exit;
}

// 3. REFRESH
if ($method === 'GET' && $action === 'refresh') {
    echo file_get_contents($dbFile);
    exit;
}

// 4. ISSUE CD
if ($method === 'POST' && $action === 'issue') {
    $db = readDb();
    $userId = $input['userId'];
    $cdId = $input['cdId'];

    $uIdx = -1; $cIdx = -1;
    foreach($db['users'] as $i=>$u) if($u['id']==$userId) $uIdx=$i;
    foreach($db['cds'] as $i=>$c) if($c['id']==$cdId) $cIdx=$i;

    if ($uIdx==-1 || $cIdx==-1) { echo json_encode(["success"=>false, "message"=>"Not found"]); exit; }
    
    if ($db['cds'][$cIdx]['available'] <= 0) { echo json_encode(["success"=>false, "message"=>"No copies available"]); exit; }
    
    // Check limit
    $active = 0;
    foreach($db['transactions'] as $t) if($t['userId']==$userId && $t['type']=='issue' && !$t['returnDate']) $active++;
    if ($active >= $db['users'][$uIdx]['maxCds']) { echo json_encode(["success"=>false, "message"=>"Limit reached"]); exit; }

    $db['cds'][$cIdx]['available']--;
    $newTrans = [
        "id" => time(), "userId" => $userId, "cdId" => $cdId, "type" => "issue",
        "issueDate" => date('Y-m-d'), 
        "dueDate" => date('Y-m-d', strtotime('+'.$db['librarySettings']['loanPeriodDays'].' days')),
        "returnDate" => null, "fine" => 0
    ];
    $db['transactions'][] = $newTrans;
    writeDb($db);
    echo json_encode(["success"=>true, "message"=>"Issued successfully!"]);
    exit;
}

// 5. RETURN CD
if ($method === 'POST' && $action === 'return') {
    $db = readDb();
    $tid = $input['transactionId'];
    
    $tIdx = -1;
    foreach($db['transactions'] as $i=>$t) if($t['id']==$tid) $tIdx=$i;
    if ($tIdx==-1) { echo json_encode(["success"=>false]); exit; }

    $trans = &$db['transactions'][$tIdx];
    $trans['returnDate'] = date('Y-m-d');
    
    // Restock
    foreach($db['cds'] as $i=>$c) {
        if ($c['id'] == $trans['cdId']) {
            $db['cds'][$i]['available']++;
            break;
        }
    }
    
    // Calc Fine
    $due = strtotime($trans['dueDate']);
    $now = time();
    if ($now > $due) {
        $days = ceil(($now - $due)/86400);
        $trans['fine'] = $days * $db['librarySettings']['finePerDay'];
    }

    writeDb($db);
    echo json_encode(["success"=>true, "message"=>"Returned."]);
    exit;
}

// 6. ADD MOVIE
if ($method === 'POST' && $action === 'add_cd') {
    $db = readDb();
    $newCd = [
        "id" => time(),
        "title" => $input['title'],
        "director" => $input['director'],
        "genre" => $input['genre'],
        "copies" => (int)$input['copies'],
        "available" => (int)$input['copies'],
        "poster" => "" 
    ];
    $db['cds'][] = $newCd;
    writeDb($db);
    echo json_encode(["success"=>true, "message"=>"Movie added successfully!"]);
    exit;
}

// 7. DELETE ITEM
if ($method === 'POST' && $action === 'delete_item') {
    $db = readDb();
    $type = $input['type']; 
    $id = $input['id'];
    
    if ($type === 'cd') {
        $db['cds'] = array_values(array_filter($db['cds'], function($c) use ($id) { return $c['id'] != $id; }));
    } else if ($type === 'user') {
        $db['users'] = array_values(array_filter($db['users'], function($u) use ($id) { return $u['id'] != $id; }));
    }
    
    writeDb($db);
    echo json_encode(["success"=>true, "message"=>"Deleted successfully."]);
    exit;
}
?>