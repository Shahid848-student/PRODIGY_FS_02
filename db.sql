-- Create database
CREATE DATABASE IF NOT EXISTS employee;
USE employee;

-- Create admin table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Insert default admin
INSERT INTO admin (username, password)
VALUES ('admin', 'admin123');

-- Create employees table
CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    salary DECIMAL(10,2) NOT NULL
);

-- Insert sample employee
INSERT INTO employees (name, email, position, salary)
VALUES ('Shahid Ehjaj', 'shahid@example.com', 'Developer', 45000.00);

