<?php
  require("db.php");
    print_r($_GET);
    $result_id=$_GET['id'];
    $result = mysqli_query($link, 'SELECT * From tasks Where id = "'.$_GET['id'].'"');

    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
    }
    $result = mysqli_fetch_assoc($result);




    $categ=mysqli_query($link, 'SELECT * From category');
    if (!$categ) {
        die('Неверный запрос: ' . mysqli_error($link));
    }
?>
<html>
    <head>
        <title>tasks - update tasks</title>
    </head>
    <body>
<a href="index.php">список задач</a>
<br/>

<form action="createupdatetasks.php">

<table border=1>
<tr>
    <input type="hidden" name="id" value="<?=$result['id']?>">
    <td>
        Название
    </td>
    <td>
        <input type="text" name="name"  value= "<?= $result['name'] ?>">
    </td>
</tr>
<tr>
    <td>
        Описание задачи
    </td>
    <td>
        <input name= "description" type="text"value="<?= $result['description'] ?>">
    </td>
</tr>
<tr>
    <td>
        Дата создания задачи
    </td>

    <td>
        <!-- <label for="date">Дата:</label> -->
        <!-- <input type="date" id="date" name="date"  value="<?= result['date'] ?>" required> -->

        <input name="date" type="text" value="<?= $result['date'] ?>">
    </td>
</tr>
<tr>
    <td>
        Дата выполнения задачи
    </td>

    <td>
        <label for="date">Дата</label>
        <input type="date" id="date" name="due_date"  value="<?= result['due_date'] ?>" required>

        <!-- <input name="date" type="text" value="<?//= $result['date'] ?>"> -->
    </td>
</tr>
<tr>
    <td>
        статус задачи
    </td>
    <td>
        <select id="type" name="status" required>
            <option value="open">новая</option>
            <option value="in progress">в работе</option>
            <option value="completed">завершена</option>
        </select>

    </td>
</tr>


<tr>
    <td>
        категория
    </td>
    <td>
        <select name="category_id">
            <?
            while ($c = mysqli_fetch_assoc($categ)) {
                $selected="";
                if ($c["id"] == $result["category_id"]){
                    $selected="selected";
                }
            ?>
                <option <?=$selected?> value="<?= $c["id"] ?>"><?= $c["name"]?></option>
            <?
            }
            ?>
        </select>

    </td>
</tr>

</table>
<input type="submit"/>
 </form>

    </body>
</html>