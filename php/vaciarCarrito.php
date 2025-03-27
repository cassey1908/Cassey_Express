<?php
require_once("../admin/config/conexion.php");

//capturamos el id del cliente
$id_cliente = $_POST['id_cliente'];

//creamos la sentencia
$sql = "DELETE FROM carrito WHERE id_cliente = $id_cliente";

//si s ejecuta bien  la consulta
if ($conn->query($sql)) {
    echo 1;
} else {
    echo "Error al vaciar el carrito";
}
// Cerrar conexión
$conn->close();
?>