<?php

require('../admin/config/conexion.php');

//si existe el id_carrito
if(isset($_POST['id_carrito'])){
    //capturamos el id del carrito
    $id_carrito = $_POST['id_carrito'];
    //creamos la sentencia
    $query= "DELETE FROM carrito WHERE id ='$id_carrito' ";
    //ejecutamos la consulta
    $result = $conn->query($query);
    //si la consulta se ejecuta correctamente
    if($result){
        echo 1; //producto eliminado del carrito
    }else{
        echo 2; //error al eliminar producto del carrito
    }
}
?>