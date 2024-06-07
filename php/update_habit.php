<?php
require 'db.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $stmt = $pdo->prepare('UPDATE habits SET status = ? WHERE id = ?');
    $stmt->execute([$status, $id]);
}
?>
