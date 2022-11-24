<?php

function createName()
{
    $name = "Kiki"; // local scope
}

createName();
echo $name . PHP_EOL;
