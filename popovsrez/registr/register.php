<?php
// Подключение к базе данных MySQL
$host = "localhost";
$username = "root";
$password = "";
$database = "srezpopov";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получение данных из формы регистрации
$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$patronymic = mysqli_real_escape_string($conn, $_POST['patronymic']);
$login = mysqli_real_escape_string($conn, $_POST['login']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password_repeat = mysqli_real_escape_string($conn, $_POST['password_repeat']);

// Проверка на совпадение паролей
if ($password !== $password_repeat) {
    die("Пароль не совпадает.");
}

// Проверка на уникальность логина и email
$query = "SELECT * FROM users WHERE login='$login' OR email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    die("Такой аккаунт уже зарегистрирован.");
}

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Вставка данных пользователя в базу данных
$query = "INSERT INTO users (name, surname, patronymic, login, email, password) VALUES ('$name', '$surname', '$patronymic', '$login', '$email', '$hashed_password')";
if (mysqli_query($conn, $query)) {
    echo "Вы зарегестрировались!";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>