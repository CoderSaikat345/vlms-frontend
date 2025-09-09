# Video Library Management System (VLMS)

<p align="center">
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
  <img alt="CSS3" src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
  <img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img alt="TailwindCSS" src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/>
</p>

A complete frontend prototype for a Video Library Management System, built entirely with vanilla HTML, CSS, and JavaScript. This project demonstrates a multi-role, single-page application (SPA) design with a clean, modern, and responsive interface that includes a full light/dark mode theme.

---

### 🌐 Live Demo

**[https://CoderSaikat345.github.io/vlms-frontend/](https://CoderSaikat345.github.io/vlms-frontend/)**


---

### 🎬 Project in Action

![Image](https://github.com/user-attachments/assets/ca4ae28c-e818-4223-b68e-41a3b28ad6df)

---

### ✨ Core Features

* **Role-Based Access Control**: Fully distinct views and permissions for four different user roles:
    * **Public (Logged-Out)**: Can browse and search the entire catalogue.
    * **Guest (Logged-In)**: Can log in to a limited member dashboard, but cannot issue items.
    * **Member**: Can issue items up to their limit, view their profile, and see their currently issued CDs.
    * **Librarian**: Can view member and inventory tables and manage library operations.
    * **Management**: Can view high-level statistics and reports, including charts.
* **Dynamic Catalogue**: The video library is dynamically rendered and updated from a JavaScript data source.
* **Search Functionality**: Users can filter the video catalogue by title, director, or genre.
* **Light/Dark Mode**: A fully functional theme toggle that respects user preference by saving it to `localStorage`.
* **Interactive Charts**: The management dashboard features a doughnut chart (via Chart.js) showing the distribution of CDs by genre.

### 🎨 UI/UX Features

* **Single Page Application (SPA)**: The entire application operates without page reloads for a fast, seamless experience.
* **Responsive Design**: The layout is fully responsive and works well on desktop, tablet, and mobile devices.
* **Modern Animations**: Subtle scroll-reveal animations and hover effects create a polished user experience.
* **Custom Modals**: Replaces default browser alerts with custom-styled modals for login and notifications.

---

### 🛠️ Technology Stack

* **HTML5**: For the core structure and content.
* **CSS3**: Custom CSS variables are used for a robust theming system.
* **Vanilla JavaScript (ES6+)**: Handles all the logic, from DOM manipulation and event handling to state management for the SPA. No frameworks or libraries were used for the core application logic.
* **Tailwind CSS (v3)**: Utilized via a CDN for a modern, utility-first approach to styling.
* **Chart.js**: Included via a CDN for data visualization.

---

### ⚙️ How to Run

This project requires **no installation** or build tools.

1.  Clone or download this repository.
2.  (Optional) Add your own poster images to a folder named `/images`.
3.  Simply open the **`index.html`** file in any modern web browser.

### 🧪 How to Test Different Roles

You can test the different user roles by using the following usernames in the login modal:
* **Guest User**: 
* **Full Member**: 
* **Librarian**: 
* **Management**: 

*(Any password will work)*

---

### 🚀 Future Improvements

- [ ] Connect the frontend to a real backend API and database (e.g., Node.js/Express, Firebase).
- [ ] Implement full CRUD (Create, Read, Update, Delete) functionality for the Librarian to manage members and inventory.
- [ ] Add more detailed pages for individual videos.
- [ ] Implement user registration and password authentication.