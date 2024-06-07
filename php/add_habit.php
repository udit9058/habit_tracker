<?php
require 'db.php';

if (isset($_POST['habit_name']) && isset($_POST['time_limit']) && isset($_POST['from_time']) && isset($_POST['to_time'])) {
    $habit_name = $_POST['habit_name'];
    $time_limit = $_POST['time_limit'];
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];
    $stmt = $pdo->prepare('INSERT INTO habits (habit_name, time_limit, from_time, to_time, status) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$habit_name, $time_limit, $from_time, $to_time, 'pending']);

    // Redirect to index.html with a success message
    header('Location: ../index.html?success=1');
    exit();
}
?>
