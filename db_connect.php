php
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli(
    '127.0.0.1',
    'root',
    '',
    'smart_student_db',
    3306
);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function is_logged_in()
{
    return isset($_SESSION['admin_id']);
}

function require_login()
{
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

