<?php
//la conexion
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cassey_express';

$conn = new mysqli($host, $user, $password, $dbname);

//verificamos la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>