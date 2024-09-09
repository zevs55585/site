<?php
require("db.php");
print_r($_GET);
$categ=mysqli_query($link, 'SELECT * From category');
//if (!$result) {
//    die('Неверный запрос: ' . mysqli_error($link));
//}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Добавить новую задачу</title>
  <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>
  <a href="index.php">список задач</a><br>
  <h1>Добавить новую задачу</h1>
  <form action="create_add.php" method="GET">
    <table border="1">
      <tr>
        <td for="date">Дата:</td>
        <td><input type="date" id="date" name="date" required></td>
      </tr>
      <tr>
        <td for="name">Название:</td>
        <td><input name="name" type="text"/></td>
      </tr>

      <tr>
        <td for="description">Описание:</td>
        <td><textarea id="description" name="description"></textarea></td>

      </tr>

      <tr>
        <td for="category">Категория:</td>
        <td><select name="category_id">
      <?
      while ($c = mysqli_fetch_assoc($categ)) {
      ?>
          <option value="<?= $c["id"] ?>"><?= $c["name"]?></option>
        <?
        }
        ?>
      </select></td>
      </tr>
      <tr>
        <td for="status">Статус:</td>
        <td><select id="type" name="status" required>
        <option value="open">новая</option>
        <option value="in progress">в работе</option>
        <option value="completed">завершена</option>
        </select></td>
      </tr>
      <tr>
        <td for="due_date">Дата выполнения задачи:</td>
        <td><input type="date" id="date" name="due_date" required></td>

      </tr>




    </table>
    <button type="submit">Сохранить</button>

  </form>
</body>
</html>