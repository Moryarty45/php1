<?php
$menuArr1 = ['Урок 1', 'Урок 2', 'Урок 3'];
?>
<ul id="menu">
    <?php
    foreach ($menuArr1 as $item) {
        echo "<li><a href='#'>$item</a></li>";
    }
    ?>
</ul>
<br>
<ul id="menu2">
<?php
$menuArr2 = [
    'Урок 1',
    'Урок 2' => ['Задание 1', 'Задание 2', 'Задание 3'],
    'Урок 3' => ['Задание 1', 'Задание 2' => ['Дополнительное задание 1', 'Дополнительное задание 2']]
];

foreach ($menuArr2 as $key => $value) {
    if ($key == null) {
        echo "<li><a href='#'>". $value ."</a>";
    } else {
        echo "<li><a href='#'>". $key ."</a>";
    }
    echo '<ul>';
    foreach ($value as $key => $subitem) {
        if (is_array($subitem)) {
            echo "<li><a href='#'>". $key ."</a>";
        } else {
            echo "<li><a href='#'>". $subitem ."</a>";
        }
        echo '<ul>';
        foreach ($subitem as $subitems) {
            echo "<li><a href='#'>$subitems</a></li>";
        }
        echo '</ul>';
        echo "</li>";
    }
    echo '</ul>';
    echo "</li>";
}
?>
</ul>