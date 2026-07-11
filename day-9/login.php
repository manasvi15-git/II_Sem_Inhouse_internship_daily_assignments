<?php
session_start();
include("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if ($email == "" || $password == "") {
        $error = "All fields are required.";
    } else {
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<?php include("header.php"); ?>

<div class="container mt-5" style="max-width:400px;">
    <form action="login.php" method="POST">
        <h3 class="mb-3">Login</h3>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button type="submit" class="btn btn-primary w-100">Login</button>

        <p class="text-center mt-3">
            Don't have an account? <a href="registration.php">Register here</a>
        </p>
    </form>
</div>

<?php include("footer.php"); ?>
