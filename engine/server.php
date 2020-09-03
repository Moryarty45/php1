<?php
require "./config/function.php";
$config = include "./config/config.php";
$conDB = mysqli_connect($config["host"], $config["user"], $config["password"], $config["db"]);
?>