<?php

echo 'Name : ';
echo 'Mohamad Rizky Isa';
echo "\n";

echo "Name : ";
echo "Mohamad\t Rizky\t Isa\n";

echo <<<KIKI
Selamat belajar PHP
sekarang, kita belajar tipe data string
ini adalah cara ke-3 membuat string
bisa menggunakan heredoc

KIKI;

echo <<<'KIKI'
Selamat belajar PHP
sekarang, kita belajar tipe data string
ini adalah cara ke-3 membuat string
bisa menggunakan heredoc
KIKI;
