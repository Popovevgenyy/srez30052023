<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Проверка валидности данных
    if (empty($login) || empty($password)) {
        $error = "Please fill in all the fields.";
    } else {
        // Проверка логина и пароля (ваша логика)

        // Если авторизация успешна
        if ($login == 'your_login' && $password == 'your_password') {
            // Установка сессионных данных
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login;

            // Перенаправление на защищенную страницу
            header('Location: secure_page.php');
            exit;
        } else {
            $error = "Invalid login or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<?php if (isset($error)) { ?>
    <div style="color: red;"><?php echo $error; ?></div>
<?php } ?>

<form method="POST" action="">
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Login</button>
</form>

<a href="registration.php">Don't have an account? Register here</a>

</body>
</html>