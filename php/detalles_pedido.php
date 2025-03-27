<?php
require('../admin/config/conexion.php');
session_start();

//capturamos el id del detalles del pedido que viene en post

$id_pedido = $_GET['id_pedido'];

//creamos la sentencia

$query = "SELECT p.nombre, p.precio, dp.cantidad, pe.total
FROM detalle_pedidos dp 
INNER JOIN pedidos pe ON pe.id = dp.id_pedido
INNER JOIN productos p ON dp.id_producto = p.id
WHERE pe.id=$id_pedido";

//ejecutamos la consulta

$result = $conn->query($query);

//creamos un array vacio, para almacenar cada fila del resultado

$detalle_pedidos = array();

//recorremos el resultado a json

while ($row = $result->fetch_assoc()){

    //almacenamos cada fila en el array detalle_pedidos

    $detalle_pedidos[] = $row;

}

//imprimimos el array en formato json

echo json_encode($detalle_pedidos);

//cerramos la conexion

$conn->close();




?>