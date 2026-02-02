<?php
session_start();
$servername = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'portfolio'; 

$conn = new mysqli($servername, $username, $password, $dbname);

session_unset(); //hapus sesi
header("Location: table.php");
exit();
?>
