<?php 

$name = "kiki";

function sayName()
{
    global $name;
    echo "Hellow $name" . PHP_EOL;
}


sayName();
?>