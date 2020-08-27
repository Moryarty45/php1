<?php
function replace($text)
{
    return str_replace(' ', '_', $text);
}

echo replace("Написал текст в котором надо заменить пробелы на подчеркивания");