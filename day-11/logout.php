<?php
session_start();

// Destroy session on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("Location: home.php");
    exit();
}
?>

<?php include("header.php"); ?>

<div class="container mt-5 text-center" style="max-width:400px;">
    <h4 class="mb-3">Logging out so early?<br>Everything okay?</h4>

    <form method="POST" action="logout.php">
        <button type="submit" class="btn btn-danger w-100 mb-2">Yes, Logout</button>
    </form>
    <a href="dashboard.php" class="btn btn-outline-secondary w-100">No, go back</a>
</div>

<?php include("footer.php"); ?>
