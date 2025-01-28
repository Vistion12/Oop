<?php
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $text = $_POST['text'];

    //insert

    header('Location: /');
    exit;

}


?>
<form action="" method="post">
    <input type="text" name="title"><br>
    <input type="text" name="text"><br>
    <input type="submit" value="Добавить">

</form>