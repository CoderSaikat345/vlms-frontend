# Video Library Management System (VLMS) - Full Stack

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
  <img alt="TailwindCSS" src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/>
  <img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img alt="JSON" src="https://img.shields.io/badge/JSON-Data-lightgrey?style=for-the-badge&logo=json&logoColor=black"/>
</p>

A comprehensive **Full-Stack Video Library Management System** designed for educational institutions. This project replaces manual record-keeping with a digital interface for issuing, returning, and managing video media.

It features a **PHP backend** with a **JSON-based database** (NoSQL style), making it lightweight, portable, and persistent without requiring a complex SQL setup.

---

### 🎬 Project in Action

![Image](https://github.com/user-attachments/assets/ca4ae28c-e818-4223-b68e-41a3b28ad6df)

---

### ✨ Core Features

#### 🔐 Role-Based Access Control (RBAC)
* **Guest**: Can browse the catalogue and rent up to **2 movies**.
* **Member**: Can rent up to **5 movies**, view profile, and track due dates.
* **Librarian**: Full admin control to **Add/Delete Movies**, **Remove Members**, and **Manage Inventory**.
* **Management**: View financial reports (Fines collected) and statistical charts.

#### 🚀 Key Functionalities
* **User Registration**: New users can sign up as Guests or Members.
* **CRUD Operations**: Librarians can Create and Delete movies and members.
* **Live Search**: Instant filtering of movies by Title, Genre, or Director.
* **Circulation Management**: Issue and Return workflows with automatic stock updates.
* **Fine Calculation**: Automatic calculation of fines for overdue items.
* **Dark Mode**: Fully responsive UI with a persistent dark theme preference.

---

### 🛠️ Technology Stack

* **Frontend**: HTML5, Vanilla JavaScript (ES6+), Tailwind CSS (CDN).
* **Backend**: PHP (REST API architecture).
* **Database**: JSON (File-based persistence).
* **Visualization**: Chart.js for management reports.

---

### ⚙️ Installation & Setup (How to Run)

Since this project uses PHP, it requires a local server environment like **XAMPP** or **WAMP**.

1.  **Download & Install XAMPP**: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2.  **Locate the Server Folder**: Go to your XAMPP installation directory (usually `C:\xampp\htdocs`).
3.  **Deploy the Project**:
    * Create a folder named `vlms` inside `htdocs`.
    * Paste all project files (`index.html`, `api.php`, `db.json`, `images/` folder) into `htdocs/vlms`.
4.  **Start the Server**:
    * Open **XAMPP Control Panel**.
    * Click **Start** next to **Apache**.
5.  **Run the App**:
    * Open your browser and visit: `http://localhost/vlms/`

> **Note**: Do not open `index.html` directly by double-clicking. It must be served via `http://localhost` for the PHP backend to function correctly.

---

### 🧪 Test Credentials

You can use these pre-configured accounts or register your own via the app:

| Role | Username | Password |
| :--- | :--- | :--- |
| **Guest** | `Saikat@345` | `2005` |
| **Member** | `Rani@2111` | `2111` |
| **Librarian** | `Ruchika` | `123` |
| **Management** | `MSD7` | `2004` |

---

### 👥 Contributors

This project was developed by **Group 05** for the Software Engineering Lab (ESC-591):

* **Saikat Mondal(Me)**: Full Stack Development (Frontend & Backend Logic)
* **Sadhana Bag**: System Design (DFD & Structured Charts)
* **Ruchika Sarrof**: Requirements Analysis & Documentation
* **Rounak Mitra**: Testing (QA) & Project Scoping

---

<p align="center">Made with ❤️ by Saikat Mondal, for B. P. Poddar Institute of Management and Technology</p>
