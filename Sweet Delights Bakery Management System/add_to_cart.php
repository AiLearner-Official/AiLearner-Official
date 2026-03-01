<?php
session_start();
$item = $_POST['item'] ?? '';
if($item) {
    $_SESSION['cart'][] = $item;
    echo "$item added to cart!";
} else {
    echo "No item selected!";
}

print_r($_SESSION['cart']);


?>