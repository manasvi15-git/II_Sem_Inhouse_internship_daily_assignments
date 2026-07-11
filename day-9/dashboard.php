<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$user = isset($_SESSION['name']) ? $_SESSION['name'] : "Guest";
$email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MyPortal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #eef2ff, #f8fafc);
        }

        .welcome-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            padding: 35px;
        }

        .action-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 22px 18px;
            text-align: center;
            transition: 0.25s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            border: 1px solid #eee;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
            color: inherit;
        }

        .action-card h5 {
            font-size: 1rem;
            margin-bottom: 4px;
        }

        .action-card p {
            font-size: 0.82rem;
            color: #777;
            margin: 0;
        }

        .email-tag {
            background: #f0f0f0;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 0.85rem;
            color: #555;
            display: inline-block;
            margin-top: 8px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="home.php">MyPortal</a>
    <div class="ms-auto d-flex align-items-center gap-2">
        <a href="home.php" class="btn btn-outline-light btn-sm">Home</a>
        <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
        <a href="contactus.php" class="btn btn-outline-light btn-sm">Contact</a>
        <a href="dashboard.php" class="btn btn-success btn-sm">Dashboard</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="welcome-card">
        <h3>Welcome, <?php echo htmlspecialchars($user); ?></h3>
        <p class="text-muted mb-1">Good to have you here. You can manage your account from the options below.</p>
        <span class="email-tag"><?php echo htmlspecialchars($email); ?></span>
    </div>
</div>

<div class="container mt-4 mb-5">
    <h6 class="text-muted mb-3">Quick Actions</h6>
    <div class="row g-3">
        <div class="col-md-4">
            <a href="updatepassword.php" class="action-card">
                <h5>Update Password</h5>
                <p>Change your account password</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="updateskills.php" class="action-card">
                <h5>Update Skills</h5>
                <p>Manage your skill list</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="pass&skill.php" class="action-card">
                <h5>Account Settings</h5>
                <p>All settings in one place</p>
            </a>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center p-3 mt-auto">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> MyPortal. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
