<?php
require "core/db.php";

$mod = $_GET['mod'] ? (string)htmlspecialchars(strip_tags($_GET['mod'])) : DEFAULT_MOD;
$content = '';
$cart = '';
$auth = '';

if ($mod && !file_exists("modules/".$mod.".php")) {
    $mod = DEFAULT_MOD;
}
session_start();
require "core/functions.php";
include "core/minicart.php";
// include "auth.php";
require "modules/".$mod.".php";
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Магазин<?= $title ? " - ".$title : "" ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="content">
    <header>
        <nav>
            <div class="nav-wrapper">
            <ul class="right hide-on-med-and-down">
                <li class="minicart"><?=($mod == "cart" ? "" : $cart);?></li>
                <li><?= ((isset($_SESSION['userid']) && isset($_SESSION['login'])) == true ? "<b><a href=?mod=auth>$_SESSION[login]</a></b>" : "<a href=?mod=auth>Вход</a>");?></li>
            </ul>
            <a href="/php1/" class="brand-logo center">PHP Shop</a>
            <ul class="left hide-on-med-and-down">
                <li><a href="?mod=gallery">Галерея</a></li>
                <li><a href="?mod=feedback">Отзывы</a></li>
                <li><a href="?mod=catalog">Каталог</a></li>
            </ul>
            </div>
        </nav>
    </header>
    <main>
    <h1><?=$title;?></h1>
    <?=$auth;?>
    <?=$content;?>
    </main>
    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PHP Shop</h5>
                <p class="grey-text text-lighten-4">Магазин написан на php с использованием Materialize css.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Ссылки</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="/php1/">Галавная</a></li>
                  <li><a class="grey-text text-lighten-3" href="?mod=gallery">Галерея</a></li>
                  <li><a class="grey-text text-lighten-3" href="?mod=feedback">Отзывы</a></li>
                  <li><a class="grey-text text-lighten-3" href="?mod=catalog">Каталог</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 PHP Shop
            </div>
          </div>
        </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</body>
</html>
