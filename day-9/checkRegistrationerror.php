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

if ($error != "") {
    $_SESSION['reg_error'] = $error;
    header("Location: registration.php");
    exit();
}
?>
