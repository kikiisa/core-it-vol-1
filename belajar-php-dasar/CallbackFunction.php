<?php

function sayHello(string $name, callable $filter)
{
    $finalName = call_user_func($filter, $name);
    echo "Hello $finalName" . PHP_EOL;
}

sayHello("Kiki", "strtoupper");
sayHello("Kiki", "strtolower");
sayHello("Kiki", function (string $name): string {
    return strtoupper($name);
});
sayHello("Kiki", fn($name) => strtoupper($name));