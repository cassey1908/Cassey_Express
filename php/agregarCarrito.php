<?php
require('../admin/config/conexion.php');
//si existe la variable id_producto en el post
if(isset($_POST['id_producto'])){
    //asignamos a una variable al id_producto
    $id_producto = $_POST['id_producto'];
    $id_cliente = $_POST['id_cliente'];
    if($_POST['accion']=='agregarCarrito' ){
        //verificamos si el producto ya existe
        $sql = "SELECT * FROM carrito WHERE id_producto = '$id_producto' AND id_cliente = '$id_cliente'";
        $result = $conn->query($sql);
        //si el producto ya existe en el carrito, no lo agregamos de nuevo
        //si en el resultado el numero de filas es mayor a cero nos pone que ya se encuentra en el carrito

        if ($result->num_rows > 0) {
            echo 1; //el producto ya esta en el carrito
            exit;
        }else{
            //sino, agregamos el producto al carrito
            $sql = "INSERT INTO carrito (id_producto, id_cliente, cantidad) VALUES ('$id_producto', '$id_cliente',1)";
            $resultado = $conn->query($sql);
            if($resultado){
                echo 2; //producto agregado al carrito
            }else{
                echo 3; //error al agregar producto al carrito
            }
        }

    }
   
    
}
?>