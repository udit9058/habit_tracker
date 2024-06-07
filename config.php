<?php
$host = 'localhost';  // Ensure this is correct. Usually 'localhost' or '127.0.0.1'
$db = 'habit_tracker';  // Ensure this matches the name of your database
$user = 'root';  // Default user for XAMPP is 'root'
$pass = '';  // Default password for XAMPP's 'root' user is an empty string
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
