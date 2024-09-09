<?
require("db.php");

print_r($_GET);
$result = mysqli_query($link, "INSERT INTO `books` (`name`, `description`, `date`,`status`,`rent_price`, `sale_price`,`author_id`,`category_id`) VALUES ('".$_GET["name"]."', '".$_GET["description"]."', '".$_GET["date"]."','".$_GET["status"]."', '".$_GET["rent_price"]."', '".$_GET["sale_price"]."','".$_GET["author_id"]."', '".$_GET["category_id"]."');");
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}

header("Location: index.php")
?>