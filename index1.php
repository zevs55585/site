<?php
require("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Подключение CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        <form action="/add-task" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
            <br>
            <label for="dueDate">Due Date</label>
            <input type="date" id="dueDate" name="dueDate">
            <br>
            <!-- Включаем логику валидации даты -->
            <!-- <script src="validation.js"></script> -->
            <button type="submit">Add Task</button>
        </form>
    </div>
    <!-- Подключение скриптов -->
    <script src="scripts.js"></script>
</body>
</html>