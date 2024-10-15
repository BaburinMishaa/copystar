<?php
include 'db.php';
session_start();

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Товар не найден.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Copy Star</title>
</head>
<body>

<h1><?php echo $product['name']; ?></h1>
<p>Цена: <?php echo $product['price']; ?> руб.</p>
<p>Описание: <?php echo $product['description']; ?></p>

<a href="catalog.php">Назад к каталогу</a>
<a href="index.php">Назад на главную</a>

</body>
</html>
