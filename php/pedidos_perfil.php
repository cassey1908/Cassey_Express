<?php
require('../admin/config/conexion.php');
session_start();
//capturamos el id de la session del cliente

$id = $_SESSION['id'];

//creamos la sentencia
$sql = "SELECT * FROM pedidos WHERE id_cliente = '$id'";

//ejecutamos la consulta y almacenamos los resultados en la variable $result
$result = $conn->query($sql);

//creamos un array vacio para almacenar cada fila del resultado

$pedidos = array();

//recorremos el resultado
while($row = $result->fetch_assoc()){
    $pedidos[] = $row;
}

//convertimos el array en un json
echo json_encode($pedidos);

//cerramos la conexion
$conn->close();


?>