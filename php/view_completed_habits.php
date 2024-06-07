<?php
require 'db.php';

$stmt = $pdo->prepare('SELECT habit_name, time_limit, from_time, to_time, completion_date, daily_report FROM done_habit');
$stmt->execute();
$done_habits = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Habits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Completed Habits</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Habit Name</th>
                    <th>Time Limit</th>
                    <th>From Time</th>
                    <th>To Time</th>
                    <th>Completion Date</th>
                    <th>Daily Report</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($done_habits as $habit): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($habit['habit_name']); ?></td>
                        <td><?php echo htmlspecialchars($habit['time_limit']); ?></td>
                        <td><?php echo htmlspecialchars($habit['from_time']); ?></td>
                        <td><?php echo htmlspecialchars($habit['to_time']); ?></td>
                        <td><?php echo htmlspecialchars($habit['completion_date']); ?></td>
                        <td><?php echo htmlspecialchars($habit['daily_report']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
