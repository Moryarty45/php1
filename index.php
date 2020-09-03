<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <link rel="stylesheet" href="public/css/photo.css">
</head>
<body>
<div class="main">        
    <div class="upload">
        <?php
        include "blocks/upload.php";
        ?>
    </div>
    <div class="photo">
    <?php
    include "blocks/content.php";
    ?>
    </div>
</div>
</body>
</html>
