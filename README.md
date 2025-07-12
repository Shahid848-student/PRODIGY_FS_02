# Employee Management System (PHP + MySQL)

✅ Internship Task 02 – Prodigy InfoTech  
💼 Full Stack Web Development Track

This project is a simple and functional Employee Management System built using PHP and MySQL. It allows an authenticated admin to securely manage employee records with full CRUD operations (Create, Read, Update, Delete).


## 🔐 Features

- Admin login system (authentication)
- Add new employee
- Edit existing employee
- Delete employee
- View all employees in dashboard
- Logout functionality
- Form validation
- Centered layout using basic HTML/CSS

## 🧰 Technologies Used

- PHP (Core)
- MySQL
- HTML + CSS
- phpMyAdmin (for database)
- XAMPP (for local server setup)

## 📁 Project Structure
employee-management/
├── login.php
├── logout.php
├── dashboard.php
├── add_employee.php
├── edit_employee.php
├── delete_employee.php
├── db.php
├── db.sql

## 🗃️ Setup Instructions

1. Open XAMPP and start Apache & MySQL.
2. Open phpMyAdmin and import the `employee_management.sql` file to create the database.
3. Place all project files inside the `htdocs/employee-management` folder.
4. Visit `http://localhost/employee-management/login.php` in your browser.

## 👤 Admin Login Credentials

Username: admin
Password: admin123

## 📌 Notes

- `db.php` contains the database connection details. Make sure they match your XAMPP MySQL credentials.
- Sample data is included in the SQL file.
- This project is built clean and simple, ideal for beginners learning PHP + MySQL-based CRUD systems.

