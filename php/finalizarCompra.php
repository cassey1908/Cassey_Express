<?php
require_once("../admin/config/conexion.php");

// Validar que se reciban los 3 parámetros
if (isset($_POST['id_cliente'], $_POST['total'], $_POST['respuesta'])) {
    // Sanitizar entradas
    $id_cliente = $_POST['id_cliente'];
    $total = $_POST['total'];
    $respuesta = json_decode($_POST['respuesta'], true);

    if (!is_array($respuesta)) {
        echo "Error en el formato de los productos";
        exit;
    }

    // Obtener datos del cliente
    $sql = "SELECT telefono, direccion FROM clientes WHERE id = $id_cliente";
    $result = $conn->query($sql);
    if (!$result || $result->num_rows == 0) {
        echo "Cliente no encontrado";
        exit;
    }

    $cliente = $result->fetch_assoc();
    $telefono = $cliente['telefono'];
    $direccion = $cliente['direccion'];

    // Insertar el pedido
    $sql = "INSERT INTO pedidos (id_cliente, total, dirreccion, telefono) VALUES ($id_cliente, $total, '$direccion', '$telefono')";
    if ($conn->query($sql)) {
        $id_pedido = $conn->insert_id;
        

        // Insertar los productos del pedido
        foreach ($respuesta as $producto) {
            if (!isset($producto['id'], $producto['cantidad'], $producto['precio'])) {
                continue; // Saltar productos con datos incompletos
            }

           $id_producto = $producto['id'];
           $cantidad = $producto['cantidad'];
           $precio = $producto['precio'];
           $subtotal = $cantidad * $precio;

            $sql = "INSERT INTO detalle_pedidos (id_pedido, id_producto, cantidad, subtotal) 
                    VALUES ($id_pedido, $id_producto, $cantidad, $subtotal)";
            $conn->query($sql);


        }

        echo 1;
    } else {
        echo "Error al insertar el pedido";
    }
} else {
    echo "Error al realizar la compra";
}

// Cerrar conexión
$conn->close();
?>
