<?php
$title = "Регистрация";
$reg = false;
$regError = false;

if ($_POST['reg'] && $_POST['login'] && $_POST['password'] && $_POST['name'] && $_POST['telephone']) {
    $login = mysqli_real_escape_string($conn, (string)htmlspecialchars(strip_tags($_POST['login'])));
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    if (mysqli_query($conn, "INSERT INTO users (login, password, name, telephone) VALUES ('$login', '$password', '$name', '$telephone')")) {
        $reg = true;
    }
    else {
        $regError = "Произошла ошибка во время регистрации";
    }

}

if ($reg) {
    $content = "<p>Вы успешно зарегистрировались!</p>";
}
else {
    $content = ($regError ? "<p>".$regError."</p>" : "")."<form action='' method='POST'>
    <p><input type='text' name='login' placeholder='Логин' pattern='^[A-Za-z][A-Za-z0-9]{3,31}$' required></p>
    <p><input type='password' name='password' placeholder='Пароль' required></p>
    <p><input type='text' name='name' placeholder='Имя' pattern='^[A-Z]{1}[a-z]{1,14} |(^[А-Я]{1}[а-я]{1,14}?$' required></p>
    <p><input type='tel' name='telephone' placeholder='Телефон' required></p>
    <p><input type='submit' value='Зарегистрироваться' name='reg'></p>
    </form>";
}