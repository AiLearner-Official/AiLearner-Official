<?php
require_once 'config.php';

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: index.html?login_required=true");
        exit();
    }
}

function getUserInfo() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'username' => $_SESSION['username'] ?? null,
            'email' => $_SESSION['email'] ?? null
        ];
    }
    return null;
}
?>