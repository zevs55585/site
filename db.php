<?
session_start();
$link = mysqli_connect('localhost','root','');
if (!$link) {
	die('Ошибка оединения:' . mysql_error());
}

$db_selected = mysqli_select_db($link,'tasks');
if (!$db_selected){
	die('Неудалось подключиться к базе tasks:' . mysqli_error($link));
}
?>