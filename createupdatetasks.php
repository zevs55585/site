<?php
  require("db.php");
//print_r($_GET);

  $queryUpdateTasks = sprintf('UPDATE tasks SET name = "%s", date="%s", description="%s", status="%s", category_id="%s", due_date="%s" WHERE id = %d', $_GET["name"], $_GET["date"], $_GET["description"],$_GET["status"], $_GET["category_id"], $_GET["due_date"], $_GET["id"]);
  $result = mysqli_query($link,$queryUpdateTasks );

  if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}

  header("Location: index.php")

?>