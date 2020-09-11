<?php
$title = "Личный кабинет";

function sign ($login, $password) {
    global $conn;
    $login = mysqli_real_escape_string($conn, (string)htmlspecialchars(strip_tags($login)));
    $result = mysqli_query($conn, "SELECT id FROM users WHERE login='$login' AND password ='$password'");
    if ($user = mysqli_fetch_assoc($result)) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['login'] = $login;
        if ($_POST['remember']) {
            setcookie("login", $login, time()+3600*24*30);
            setcookie("password", $password, time()+3600*24*30);
        }
        return true;
    }
    return false;
}

if ((!isset($_SESSION['userid']) || !isset($_SESSION['login'])) && isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    sign($_COOKIE['login'], mysqli_real_escape_string($conn, (string)htmlspecialchars(strip_tags($_COOKIE['password']))));
}

$authError = false;
if ($_POST['sign'] && $_POST['login'] && $_POST['password']) {
    if (!sign($_POST['login'], md5($_POST['password']))) {
        $authError = "Неверные логин или пароль";
    }
}

if ($_POST['logout']) {
    unset($_SESSION['userid']);
    unset($_SESSION['login']);
    setcookie("login", $login, time()-3600);
    setcookie("password", $password, time()-3600);
}

if (isset($_SESSION['userid']) && isset($_SESSION['login'])) {
    $prof = mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['userid']);
    $profile = mysqli_fetch_assoc($prof);
    $auth = "<h3>Привет, <b>".$_SESSION['login']."</b></h3>
    <div class='profile'>
    <div>Ваше имя: ".$profile['name']."</div>
    <div>Ваш телефон: ".$profile['telephone']."</div>
    </div>
    <form action='' method='POST'>
        <button class='btn waves-effect waves-light' type='submit' name='logout' value='Выйти'>Выйти
            <i class='material-icons right'>send</i>
        </button>
    </form>";
}
else {
    $auth = "<form class='auth' action ='' method='POST'>
            <p><input type='text' name='login' placeholder='Логин' pattern='^[A-Za-z][A-Za-z0-9]{3,31}$' required>".($authError ? " ".$authError : "")."</p>
            <p><input type='password' name='password' placeholder='Пароль' required> <input type='checkbox' name='remember' value='1' id='remember'> <label for='remember'>запомнить меня</label></p>
            <button class='btn waves-effect waves-light' type='submit' name='sign' value='Войти'>Войти
                <i class='material-icons right'>send</i>
            </button>
            <div>Нет аккаунта? </div><a href='?mod=reg'>Зарегистрироваться</a></p>
         </form>";
}