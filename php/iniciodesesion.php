<?php
require('../admin/config/conexion.php');

//capturamos los imput del formulario con post

$email = $_POST['correo'];
$contraseña = $_POST['contraseña'];

//validamos si el correo existe
$sql = "SELECT * FROM clientes WHERE email = '$email'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $cliente = $result->fetch_assoc();
    //validamos la contraseña del cliente  con password_verify
    if(password_verify($contraseña, $cliente['contraseña'])){
        session_start();
        $_SESSION['id'] = $cliente['id'];
        $_SESSION['nombre'] = $cliente['nombre'];
        echo 1; //inicio de sesion correcto
    }else{
        echo 2; //contraseña incorrecta
    }
}else{
    echo 3; //el correo no existe
}

?>