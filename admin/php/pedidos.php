<?php
require_once ("../config/conexion.php");

if(isset($_POST['accion']) && $_POST['accion'] == 'traer'){
    //capturar todo los pedidos

        $query = "SELECT p.id, c.nombre, c.direccion, p.fecha_pedido, p.total, p.estado FROM pedidos p
INNER JOIN clientes c on c.id = p.id_cliente;";
        $result = $conn->query($query);

        //array

        $pedidos = array();

        //recorrer los resultados

        while($row = $result->fetch_assoc()){
            $pedidos[] = $row;
        }

        //convertir el array a json

        echo json_encode($pedidos);
}else if(isset($_POST['accion']) && $_POST['accion'] == 'actualizar'){
    //capturar el id del pedido
    $id_pedido = $_POST['id'];
    //capturar el nuevo estado
    $estado = $_POST['estado'];
    echo $id_pedido;
    //query para actualizar el estado del pedido
    $query = "UPDATE pedidos SET estado = '$estado' WHERE id = $id_pedido";
    $result = $conn->query($query);
    if($result){
        echo 1; //estado actualizado
    }else{
        echo 2; //error al actualizar estado
    }

}




?>