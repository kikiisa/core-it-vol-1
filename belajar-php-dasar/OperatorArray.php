<?php

$first = [
    "first_name" => "Eko"
];

$last = [
    "first_name" => "Budi",
    "last_name" => "isa"
];

$full = $first + $last;
var_dump($full);

$a = [
    "first_name" => "Kiki",
    "last_name" => "Isa"
];

$b = [
    "last_name" => "Oya",
    "first_name" => "Wartabone"
];

var_dump($a == $b);
var_dump($a === $b);