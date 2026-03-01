<?php
require_once 'contact_handler.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $handler = new ContactHandler();
    $result = $handler->saveMessage(
        $_POST['name'],
        $_POST['email'],
        $_POST['message']
    );
    
    if($result == "success") {
        header("Location: index.php?contact=success");
    } else {
        header("Location: index.php?contact=error&message=" . urlencode($result));
    }
    exit();
}
?>
