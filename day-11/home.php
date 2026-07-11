<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | My Portal</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #eef2ff, #f8fafc);
        }

        .hero {
            padding: 100px 20px;
        }

        .feature-card {
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="home.php">MyPortal</a>

    <div class="ms-auto d-flex align-items-center gap-2">
        <a href="home.php" class="btn btn-outline-light btn-sm">Home</a>
        <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
        <a href="contactus.php" class="btn btn-outline-light btn-sm">Contact</a>
        <?php if (isset($_SESSION['user_email'])): ?>
            <a href="dashboard.php" class="btn btn-success btn-sm">Dashboard</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-outline-light btn-sm">Login</a>
            <a href="registration.php" class="btn btn-warning btn-sm">Register</a>
        <?php endif; ?>
    </div>
</nav>

<!-- HERO SECTION -->
<div class="container text-center hero">
    <h1 class="display-4 fw-bold">Welcome to Your Portal</h1>
    <p class="lead text-muted">
        Manage your account, update details, and explore your dashboard — all in one place.
    </p>

    <?php if (!isset($_SESSION['user_email'])): ?>
        <a href="registration.php" class="btn btn-primary btn-lg mt-3 me-2">Get Started</a>
        <a href="login.php" class="btn btn-outline-dark btn-lg mt-3">Login</a>
    <?php else: ?>
        <a href="dashboard.php" class="btn btn-success btn-lg mt-3">Go to Dashboard</a>
    <?php endif; ?>
</div>

<!-- FEATURES SECTION -->
<div class="container mb-5">
    <div class="row text-center g-4">

        <div class="col-md-4">
            <div class="card p-4 shadow-sm feature-card h-100">
                <h4>🔐 Secure Login</h4>
                <p class="text-muted">Your data stays protected with session-based authentication.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 shadow-sm feature-card h-100">
                <h4>📊 Dashboard</h4>
                <p class="text-muted">Access your personal dashboard after login.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 shadow-sm feature-card h-100">
                <h4>⚙️ Manage Account</h4>
                <p class="text-muted">Update password and manage your profile easily.</p>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
    <p class="mb-0">© <?php echo date("Y"); ?> MyPortal</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
