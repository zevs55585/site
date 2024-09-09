<?php
// Подключение к базе данных
require_once 'db.php';

// Запрос на получение данных
$sql = "SELECT * FROM tasks";
$result = mysqli_query($link, $sql);

// Создание Excel файла
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tasks.xls"');
header('Cache-Control: max-age=0');

// Вывод заголовков столбцов
echo "ID\tДата\tНазвание\tОписание\tКатегория\tСтатус\n";

// Вывод данных
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . "\t";
    echo $row['date'] . "\t";
    echo $row['name'] . "\t";
    echo $row['description'] . "\t";
    echo $row['category_id'] . "\t";
    echo $row['status'] . "\n";
}

// Завершение работы скрипта
exit;
?>