<?php
require("db.php");



$r = $_SESSION["user"]
?>
<html>
	<head>
		<title>tasks - user profile</title>
	</head>
	<body>
<a href="index.php">главная сраница</a>

<br/>
<table border=1>
<?


	echo "<tr>"; // определяет строку в таблице.
	echo "<td>".$r["id"]."</td>";//первый столбец  // определяет ячейку в таблице
	echo "<td>".$r["name"]."</a></td>"; //второй столбец  //адрес документа на который ведет ссылка
	echo "<td>".$r["email"]."</td>"; // 3 столбец
	echo "<td>".$r["password"]."</td>";  //4 столбец
	echo "<td><a href='updateuser.php?id=" . $r["id"] ."'>изменить</a></td>";

	echo "<td><a href='deleteuser.php?id=" . $r["id"]."'>Удалить</a></td>";

	echo "</tr>\n";

?>
</table>




	</body>
</html>