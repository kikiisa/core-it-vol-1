<?php 


$conn = new mysqli("localhost","root","","db_link");

if($conn->connect_error)
{
    die("Koneksi Failed" . $conn->connect_error);
}




?>