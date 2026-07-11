<?php
$host = "localhost";
$user = "root";
$database = "industrial_training";
$conn = false;

// Try password "manasvi" first, then empty password (XAMPP default)
$passwords = ["manasvi", ""];

foreach ($passwords as $pwd) {
    try {
        $conn = new mysqli($host, $user, $pwd);
        if (!$conn->connect_error) {
            break;
        }
    } catch (Exception $e) {
        $conn = false;
        continue;
    }
}

if (!$conn || $conn->connect_error) {
    die("Connection Failed. Please check your MySQL credentials in db_connect.php");
}

// Create database and select it
$conn->query("CREATE DATABASE IF NOT EXISTS `$database`");
$conn->select_db($database);

// Create user table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    skills TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
?>
