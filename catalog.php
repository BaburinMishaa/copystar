<?php
include 'db.php';
session_start();

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров - Copy Star</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        h3 {
            margin: 10px 0;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Каталог товаров</h1>

<?php foreach ($products as $product): ?>
    <div style="background-color: #1e1e1e; padding: 20px; border-radius: 4px; margin-bottom: 10px;">
        <h3><?php echo $product['name']; ?></h3>
        <p>Цена: <?php echo $product['price']; ?> руб.</p>
        <p>Описание: <?php echo $product['description']; ?></p>
        <a href="product.php?id=<?php echo $product['id']; ?>">Подробнее</a>
        <a href="catalog.php?add=<?php echo $product['id']; ?>">В корзину</a>
    </div>
<?php endforeach; ?>

<?php
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }
    header("Location: catalog.php");
    exit;
}
?>

<a href="cart.php">Перейти в корзину</a>
<a href="index.php">Назад на главную</a>

</body>
</html>
