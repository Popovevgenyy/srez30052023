<?php
session_start();

// Уничтожение сессии и перенаправление на страницу авторизации
session_destroy();
header('Location: login.php');
exit;
?>