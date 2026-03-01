<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>
<h2>Your Cart Items</h2>
<?php if(count($cart) > 0): ?>
    <ul>
        <?php foreach($cart as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
<a href="index.php">Back to Shop</a>
</body>
</html>