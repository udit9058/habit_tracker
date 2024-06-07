<?php
require 'db.php';

if (isset($_POST['habit_name']) && isset($_POST['completion_date'])) {
    $habit_id = $_POST['habit_name'];
    $completion_date = $_POST['completion_date'];
    $daily_report = isset($_POST['daily_report']) && $_POST['daily_report'] == 'completed' ? 'completed' : 'incompleted';

    // Fetch habit details from habits table
    $stmt = $pdo->prepare('SELECT habit_name, time_limit, from_time, to_time FROM habits WHERE id = ?');
    $stmt->execute([$habit_id]);
    $habit = $stmt->fetch();

    if ($habit) {
        $habit_name = $habit['habit_name'];
        $time_limit = $habit['time_limit'];
        $from_time = $habit['from_time'];
        $to_time = $habit['to_time'];

        // Insert completion report into done_habit table
        $stmt = $pdo->prepare('INSERT INTO done_habit (Id, habit_name, time_limit, from_time, to_time, completion_date, daily_report) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$habit_id, $habit_name, $time_limit, $from_time, $to_time, $completion_date, $daily_report]);

        // Redirect to index.html with a success message
        header('Location: ../index.html?success=1');
        exit();
    } else {
        // Habit not found
        header('Location: ../index.html?error=1');
        exit();
    }
}
?>
