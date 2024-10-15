<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Star - Главная</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        a {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>

<h1>Добро пожаловать в Copy Star</h1>
<p>Здесь вы можете купить копировальное оборудование.</p>

<h2>Навигация</h2>
<a href="register.php">Регистрация</a>
<a href="login.php">Вход</a>
<a href="catalog.php">Каталог товаров</a>
<a href="cart.php">Корзина</a>

<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    echo '<a href="admin.php">Админ-панель</a>';
}
?>

<a href="about.php">О нас</a>
<a href="contact.php">Где нас найти?</a>

</body>
</html>
