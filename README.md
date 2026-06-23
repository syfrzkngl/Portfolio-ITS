# 🌐 Personal Web Portfolio - ITS Internship Project

A responsive and modern personal portfolio website built from scratch during my web development internship program at **Institut Teknologi Sepuluh Nopember (ITS)**. This project showcases my skills, experience, and projects with a clean custom user interface.

---

## 🚀 Features

* **Custom Responsive Navigation:** Fixed-top sleek navbar that stays crisp on both Desktop and Mobile devices.
* **Interactive UI:** Dynamic typing animation effect on the hero section using pure CSS keyframes.
* **Sleek Custom Cards:** Dedicated grid showcase for skills and pages with smooth hover transformations.
* **Contact/Hire System:** Integrated form structure ready to connect with MySQL database.
* **Fully Responsive:** Handcrafted CSS media queries optimized for mobile inspect tools.

---

## 🛠️ Tech Stack

* **Backend:** PHP (Native)
* **Frontend:** HTML5, CSS3 (Custom Flexbox, Keyframes Animation)
* **Database:** MySQL
* **Development Environment:** Laragon & HeidiSQL

---

## ⚙️ Installation & Local Setup

To run this project locally using **Laragon**, follow these steps:

### 1. Clone the Repository
Clone this repository into your Laragon's local server directory (usually `C:\laragon\www\`):
```bash
cd C:\laragon\www
git clone [https://github.com/syfrkngl/Portfolio.git]
2. Database Migration (Setup)
Since this is a Native PHP project, you can easily migrate the structure using HeidiSQL or phpMyAdmin via Laragon:

Open Laragon and click Start All.

Click the Database button to launch HeidiSQL (or go to http://localhost/phpmyadmin/).

Create a new database named portfolio.

Open the Query tab or Import menu, paste the SQL schema for your tables (e.g., kontak table), and execute (F9).

Example SQL Schema:

SQL
CREATE TABLE IF NOT EXISTS kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pesan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
3. Run the Project
Open your favorite browser and access the local server domain created automatically by Laragon:

Plaintext
http://localhost/Portfolio/
📸 Preview & Testing Mobile Responsiveness
You can easily test the mobile responsiveness by right-clicking on the webpage -> Inspect -> toggle the Device Toolbar (Ctrl+Shift+M) to view the auto-centered mobile navbar layout.

👨‍💻 Internship Identity
Role: Web Developer Intern

Institution: Institut Teknologi Sepuluh Nopember (ITS)
