<?php

require('../admin/config/conexion.php');
session_start();
//capturamos el id de la session del cliente
$id = $_SESSION['id'];
//capturamos los id del modal con post





if (isset($_POST['accion']) && $_POST['accion'] == 'actualizar') {
    $nombre = $_POST['nombre'];
    $correo=$_POST['correo'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    //creamos una sentencia para actualizar los datos del cliente
    $sql = "UPDATE clientes SET nombre='$nombre', email='$correo', direccion='$direccion', telefono='$telefono' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo 2; //datos actualizados correctamente
    } else {
        echo 3; //error al actualizar los datos
    }
}else{
    //creamos una sentencia para capturar todos los datos del cliente
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $result = $conn->query($sql);
    //creamos la  variable json
    $datos = array();
    //creamos un while para recorrer la variable result
    while($row = $result->fetch_assoc()){
        $datos[] = $row;
    }
    echo json_encode($datos);
    
}




 




// //creamos una sentencia para actualizar los datos del cliente
// $sql = "UPDATE clientes SET nombre='$nombre', email='$correo', direccion='$direccion', telefono='$telefono' WHERE id = '$id'";
// if ($conn->query($sql) === TRUE) {
//     echo 2; //datos actualizados correctamente
// } else {
//     echo 3; //error al actualizar los datos
// }
// $conn->close();






?>