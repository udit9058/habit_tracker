<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM habits');
while ($row = $stmt->fetch()) {
    echo '<div class="habit-item">';
    echo '<span>ID: ' . htmlspecialchars($row['id']) . ' - Habit: ' . htmlspecialchars($row['habit_name']) . ' - Time Limit: ' . htmlspecialchars($row['time_limit']) . ' - From: ' . htmlspecialchars($row['from_time']) . ' to ' . htmlspecialchars($row['to_time']) . '</span>';
    if ($row['status'] == 'pending') {
        echo '<button class="btn btn-success update-habit" data-id="' . $row['id'] . '" data-status="completed">Complete</button>';
    }
    echo '</div>';
}
?>
