<?php
include 'db.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
}

$cart_items = [];
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $cart_items[$product_id] = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина - Copy Star</title>
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
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            width: 300px;
        }
        li {
            background-color: #1e1e1e;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Корзина</h1>

<?php if (empty($cart_items)): ?>
    <p>Ваша корзина пуста</p>
<?php else: ?>
    <ul>
        <?php foreach ($cart_items as $product): ?>
            <li>
                <?php echo $product['name']; ?> - Количество: <?php echo $_SESSION['cart'][$product['id']]; ?>
                <a href="cart.php?remove=<?php echo $product['id']; ?>">Удалить</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="catalog.php">Продолжить покупки</a>
<a href="index.php">Назад на главную</a>

</body>
</html>
