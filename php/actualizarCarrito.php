<?php
require('../admin/config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    if ($accion === 'actualizarCantidad') {
        $id_carrito = $_POST['id_carrito'];
        $cantidad = $_POST['cantidad'];
        echo $cantidad;

        // Evitar valores negativos o 0
        if ($cantidad < 1) {
            $cantidad = 1;
        }

        $sql = "UPDATE carrito SET cantidad = $cantidad WHERE id = $id_carrito";
        $stmt = $conn->query($sql);

        if ($stmt) {
            echo json_encode(["status" => "success", "message" => "Cantidad actualizada"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al actualizar"]);
        }

        
    }
}
?>
