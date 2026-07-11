<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .contact-box {
            max-width: 500px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-custom {
            width: 100%;
            border-radius: 8px;
        }

        .small-text {
            font-size: 14px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="home.php">MyPortal</a>
    <div class="ms-auto d-flex align-items-center gap-2">
        <a href="home.php" class="btn btn-outline-light btn-sm">Home</a>
        <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
        <a href="contactus.php" class="btn btn-outline-light btn-sm active">Contact</a>
    </div>
</nav>

<!-- Contact Form -->
<div class="contact-box">

    <h3 class="text-center mb-3">Contact Us</h3>

    <p class="text-center text-muted mb-4">
        Have a question or feedback? We'd love to hear from you.
    </p>

    <form method="POST" action="tymessage.php">
        <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>

        <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>

        <textarea name="message" class="form-control mb-3" rows="4" placeholder="Your Message" required></textarea>

        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>

    <p class="small-text mt-3">
        Or email us at: support@MyPortal.com
    </p>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> MyPortal. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
