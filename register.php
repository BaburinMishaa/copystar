<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($surname) && !empty($login) && !empty($email) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (name, surname, login, email, password) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $surname, $login, $email, $hashed_password])) {
            echo "Регистрация прошла успешно!";
        } else {
            echo "Ошибка при регистрации.";
        }
    } else {
        echo "Все поля обязательны для заполнения.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Copy Star</title>
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
            height: 100vh;
        }
        form {
            background-color: #1e1e1e;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            background-color: #2a2a2a;
            color: #ffffff;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<form method="post">
    <h1>Регистрация</h1>
    Имя: <input type="text" name="name" required><br>
    Фамилия: <input type="text" name="surname" required><br>
    Логин: <input type="text" name="login" required><br>
    Email: <input type="email" name="email" required><br>
    Пароль: <input type="password" name="password" required><br>
    <input type="submit" value="Зарегистрироваться">
    <a href="index.php">Назад на главную</a>
</form>

</body>
</html>
