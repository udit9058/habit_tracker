<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT habit_name, time_limit, from_time, to_time FROM habits WHERE id = ?');
    $stmt->execute([$id]);
    $habit = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($habit);
}
?>
