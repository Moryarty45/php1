<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $reset = $_POST['reset'];

    if ($reset) {
        $view = "";
        $number1 = 0;
        $number2 = 0;
        $operation = false;
        $view = "";
    }

    if ($operation) {
        if ($operation == "+") {
            $result = $number1 + $number2;
        }
        if ($operation == "-") {
            $result = $number1 - $number2;
        }
        if ($operation == "*") {
            $result = $number1 * $number2;
        }
        if ($operation == "/") {
            $result = ($number2 != 0) ? $number1 / $number2 : "Нельзя делить на 0";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>
<div style="width:70%; margin:0 auto; padding-top: 10px; text-align: center;">
<h2>Калькулятор</h2>
<form action="" method="post">
    <input name="number1" type="text" value="<?= $number1 ?>">
    <?= $operation ?>
    <input name="number2" type="text" value="<?= $number2 ?>">
    = <?= $result ?><br>
    <h4>Через select</h4>
    <select name="operation" onchange="submit()">
        <option value="">Операция</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br>
    <h4>Через кнопки</h4>
    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/><br>
    <h4>Сброс</h4>
    <input name="reset" value="Reset" type="submit"/>
</form>
</div>
</body>
</html>
