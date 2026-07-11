<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .about-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="home.php">MyPortal</a>
    <div class="ms-auto d-flex align-items-center gap-2">
        <a href="home.php" class="btn btn-outline-light btn-sm">Home</a>
        <a href="about.php" class="btn btn-outline-light btn-sm active">About</a>
        <a href="contactus.php" class="btn btn-outline-light btn-sm">Contact</a>
    </div>
</nav>

<!-- About Section -->
<div class="container mt-5">
    <div class="about-box">
        
        <h2 class="text-center mb-4">About Us</h2>

        <p>
            This platform is designed to help users manage and submit their projects in a simple and organized way.
            It provides a clean interface and smooth experience for tracking work and staying productive.
        </p>

        <p>
            Our goal is to create a centralized system where users can handle their tasks efficiently without confusion.
        </p>

        <h4 class="mt-4">Features</h4>
        <ul>
            <li>🔐 Secure Login & Registration</li>
            <li>📊 Personalized Dashboard</li>
            <li>📋 Submission & Tracking</li>
            <li>⚙️ Easy Profile Management</li>
        </ul>

        <h4 class="mt-4">Developer</h4>
        <p>
            This website was developed as part of a web development project using HTML, CSS, JavaScript, and PHP.
        </p>

        <h4 class="mt-4">Future Plans</h4>
        <p>
            We plan to add more features like notifications, collaboration tools, and advanced analytics to improve user experience.
        </p>

        <div class="d-flex justify-content-center mb-4">
            <a href="home.php" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> MyPortal. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
