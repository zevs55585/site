<?
require("db.php");

$result =mysqli_query($link, 'DELETE FROM `user` WHERE `id` = "'.$_GET['id'].'"');
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}

header("Location: index.php")
?>