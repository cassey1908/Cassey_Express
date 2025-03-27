<?php
require('../admin/config/conexion.php');


$traerCategoria=$_POST['accion'];
//si existe la accion, y la accion es igual a traer productos
if(isset($_POST['accion'])&& $_POST['accion']== 'traerProductos'){
    //capturamos el id de la categoria y lo igualamos a una variable
        $id_categoria=$_POST['id_categoria'];
        //creamos la sentencia 
        $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria";
        //ejecutamos la consulta,y lo almacenamos en la variable result
        $result = $conn->query($query);
        //creamos un array vacio,para almacenar cada fila del resultado
        $productos = array();
        //recorremos el resultado
       while ($row = $result->fetch_assoc()){ 
            //almacenamos cada fila en el array productos
            $productos[] = $row;
        }
        
        //imprimimos el array en formato json
        echo json_encode($productos);
        



}
?>