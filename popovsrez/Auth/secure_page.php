<?php
session_start();

// Проверка наличия сессии и авторизации
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Page</title>
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

<p>This is a secure page accessible only to logged-in users.</p>

<a href="logout.php">Logout</a>

</body>
</html>