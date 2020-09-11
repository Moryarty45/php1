<?php
include_once "config.php";
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($conn, "utf8");