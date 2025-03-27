<?php
require('../admin/config/conexion.php');
//si existe el id cliente en el post
if(isset($_POST['id_cliente'])&& $_POST['accion']=='traerCarrito'){
    //capturanos el id del cliente
    $id_cliente = $_POST['id_cliente'];
    //creamos la sentencia
    $query= "SELECT p.imagen, p.nombre, p.precio, p.id , c.id as id_carrito, c.cantidad
FROM carrito c
JOIN productos p
on c.id_producto = p.id
WHERE c.id_cliente ='$id_cliente' ";
    //ejecutamos la consulta y lo almacenamos en la variable result
    $result = $conn->query($query);
    //creamos un array vacio, para almacenar cada fila del resultado
    $carrito = array();
    //recorremos el resultado
    while ($row = $result->fetch_assoc()){
        //almacenamos cada fila en el array carrito
        $carrito[] = $row;
    }
    //imprimimos el array en formato json
    echo json_encode($carrito);
 //si existe la variable accion en el post// para notificacion del carrito
}else if(isset($_POST['accion'])&& $_POST['accion']=='notificacionCarrito'){
    //campturamos el id del cliente
    $id_cliente = $_POST['id_cliente'];
    //creamos la sentencia para obtener el total de productos en el carrito del cliente
    $query= "SELECT COUNT(*) as total FROM carrito WHERE id_cliente = '$id_cliente'";
    //ejecutamos la consulta y lo almacenamos en la variable result
    $result = $conn->query($query);
    //recorremos el resultado
    $total = $result->fetch_assoc();
    //imprimimos el resultado en formato json
    echo json_encode($total);

}
?>