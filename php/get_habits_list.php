<?php
require 'db.php';

$stmt = $pdo->query('SELECT id, habit_name FROM habits');
echo '<option value="">Select Habit</option>';
while ($row = $stmt->fetch()) {
    echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['habit_name']) . '</option>';
}
?>
