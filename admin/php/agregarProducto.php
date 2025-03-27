<?php
require_once ("../config/conexion.php");

//validar si existe nombre y la accion , y la accion es = a agregarproducto
if(isset($_POST['nombre_producto'])&& isset($_POST['accion'])&& $_POST['accion']=='agregarProducto'){
    //capturamos la ruta de la imagen
    $ruta="../img/";
    //capturamos el nombre de la imagen
    $imagen=$_FILES['imagen_producto']['name'];
    //alamacenamos la img en  el directorio temporal
    $ruta_temporal=$_FILES['imagen_producto']['tmp_name'];
    //modificacion el nombre de la imagen
    $arrayNombreArch=explode('.',$imagen);
    $extension=strtolower(end($arrayNombreArch)); //strtolower:convierte en miniscula
    //array de extensiones permitidos de la imagen
    $extensiones=array('jpg','jpeg','png','gif');
    //validamos si la extension de la imagen es permitida cogiendo la extension y las extensiones
    if(in_array($extension,$extensiones)){
        //validamos si la imgen se sube, sacondolo del directorio temp a la ruta de la img junto con la extension
        if(move_uploaded_file($ruta_temporal,$ruta.$imagen)){
            //capturamos el nombre del producto
            $nombre=$_POST['nombre_producto' ];
            //capturamos la descripcion del producto
            $descripcion=$_POST['descripcion_producto'];
            //capruramos el precio
            $precio=$_POST['precio_producto'];
            //capturamos el id de la categoria
            $idCategoria=$_POST['categoria_producto'];
            //insertamos la categoria
            
            $sql="INSERT INTO productos (nombre,descripcion,precio,id_categoria,imagen) VALUES ('$nombre','$descripcion','$precio','$idCategoria','$imagen')";

            $result=$conn->query($sql);
            if($result){
                echo 1; //registro exitoso
            }else{
                echo 2; //registro fallido
            }
        }else{
            echo 3; //no se ha podido subir la imagen
        }

       
    }else{
        echo 4; //extension no permitida
    }
  //traer las categorias: si existe la accion y es igual a traercategorias
}else if(isset($_POST['accion'])&&$_POST['accion']=='traerCategorias'){
    //que nos traiga todas las categorias
    $sql="SELECT * FROM categorias";
    //ejecutamos la consulta
    $result=$conn->query($sql);
    //creamos un array donde vamos a pasar los datos del resultado
    $categorias=array();
    //recorremos cada dato introduciendolo en el array
    while($fila=$result->fetch_assoc()){
        $categorias[]=$fila;
    }
    //pasamos el array a json para que pueda ser leido por ajax
    echo json_encode($categorias);
}

//traer los productos: si existe la accion y es igual a cargarProductos
else if(isset($_POST['accion'])&&$_POST['accion']=='cargarProductos'){
    //capturamos el id_categoria
    $idCategoria=$_POST['id_categoria'];


    //que nos traiga todas las categorias
    $sql="SELECT * FROM productos WHERE id_categoria='$idCategoria'"; 
    //ejecutamos la consulta
    $result=$conn->query($sql);
    //creamos un array donde vamos a pasar los datos del resultado
    $productos=array();
    //recorremos cada dato introduciendolo en el array
    while($fila=$result->fetch_assoc()){
        $productos[]=$fila;
    }
    //pasamos el array a json para que pueda ser leido por ajax
    echo json_encode($productos);
}




?>