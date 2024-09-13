<?php
require("db.php");

//print_r($_GET);

function allTasksByUser($link, $user_id) {
    $result = mysqli_query($link, "SELECT e.*, c.name category_name FROM `tasks` e INNER JOIN category c on c.id = e.category_id WHERE user_id = '$user_id' ORDER BY date DESC");


    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
    }

    $res = [];
    while ($u = mysqli_fetch_assoc($result)){   //$r  переменная
        $res[] = $u;
    }
    return $res;
}
$r = $_SESSION["user"]

?>
<!DOCTYPE html>
<html>
<head>
  <title>Журнал задач</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
  <div style="position:absolute; right:10px;top:10px;">
    <?
    if (!$_SESSION["user"]){
      ?>
      <a href="auth.php">Вход</a>
      <a href="registration.php">Зарегистрироваться</a>
      <?
    } else{
      ?>
      <a href="logout.php">Выход</a>
      <a href="user.php"><?=$_SESSION["user"]["name"]?></a>
      <?

    }
    ?>
  </div>
  <h1>задачи</h1>
<?
    if (isset($_SESSION["user"]) )
  {
    echo "<a href=add.php>Добавить новую задачу</a><br>";
    echo "<a href=cxls.php>экспорт данных </a><br>";

    }

    ?>


  <!-- <a href="add.php">Добавить новую задачу</a> -->
  <!-- <a href="xls.php">экспорт данных</a> -->
  <?
$tasks = allTasksByUser($link, $_SESSION['user']['id']);

if (count($tasks) == 0) {
  echo "<br/>список задач пуст";
} else {
  echo "<br/>список задач:";

?>

<br/>
<table border=1>
  <tr>
      <th>Дата</th>
      <th>Название</th>
      <th>Описание</th>
      <th>Категория</th>
      <th>Статус</th>
      <th>Дата выполнения<br> задачи</th>
      <th>Редактирование</th>
      <th>Удаление</th>
    </tr>

<?

$typeNames = ["open"=>"новая", "in progress"=>"в работе", "completed" => "завершена"];
//open','in progress','completed'

//$dohod = 0;
//$rashod = 0;
foreach ($tasks as $key => $u) {
   //code...
 //} ($u = mysqli_fetch_assoc($result)){   //$r  переменная
  echo "<tr>"; // определяет строку в таблице.
  echo "<td>".$u["date"]."</td>";//первый столбец  // определяет ячейку в таблице
  echo "<td>".$u["name"]."</a></td>"; //второй столбец  //адрес документа на который ведет ссылка
  echo "<td>".$u["description"]."</td>"; // 3 столбец
  echo "<td>".$u["category_name"]."</td>";  //4 столбец
  echo "<td>".$typeNames[$u["status"]]."</td>"; // 3 столбец
  echo "<td>".$u["due_date"]."</td>";
  echo "<td><a href='updatetasks.php?id=" . $u["id"] ."'>изменить задачу</a></td>";
  echo "<td><a href='deletetasks.php?id=" . $u["id"]."'>Удалить</a></td>";
  echo "</tr>\n";

  //if ($u['type']=='income') {
  //  $dohod += $u["amount"];
  //} else {
  //  $rashod += $u['amount'];
  //}
}
}
?>
</table>

<?
//echo "Dohod: ".$dohod.", Rashod: ". $rashod . ", Balance: ". ($dohod - $rashod);
?>
</body>
</html>