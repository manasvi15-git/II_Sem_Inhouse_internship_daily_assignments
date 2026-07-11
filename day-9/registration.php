<?php
session_start();
include("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : "";
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $error = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Check if email already exists
        $checkQuery = "SELECT * FROM user WHERE email='$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $error = "This email is already registered.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

            if (mysqli_query($conn, $query)) {
                $_SESSION['success'] = "Registration successful!";
                $_SESSION['name'] = $name;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                header("Location: success.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>

<?php include("header.php"); ?>

<div class="container mt-5" style="max-width:400px;">
    <form action="registration.php" method="POST">
        <h3 class="mb-3">Register</h3>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <input type="password" name="confirmPassword" class="form-control mb-3" placeholder="Confirm Password" required>
        <button type="submit" class="btn btn-primary w-100">Register</button>

        <p class="text-center mt-3">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </form>
</div>

<?php include("footer.php"); ?>
