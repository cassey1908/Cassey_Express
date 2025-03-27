<?php
require_once ("../config/conexion.php");

//validar si existe una var nombre
if(isset($_POST['Nombre'])){
    //capturamos la ruta de la imagen
    $ruta="../img/";
    //capturamos a la imagen
    $imagen=$_FILES['Imagen']['name'];
    //creamos el directorio temporal
    $ruta_temporal=$_FILES['Imagen']['tmp_name'];
    //modificacion del nombre de la imagen
    $arrayNombreArch=explode('.',$imagen);
    $extension=strtolower(end($arrayNombreArch)); //strtolower:convierte en miniscula
    //array de extensiones permitidos de la imagen
    $extensiones=array('jpg','jpeg','png','gif');
    //validamos si la extension de la imagen es permitida
    if(in_array($extension,$extensiones)){
        //validamos si la imgen se sube
        if(move_uploaded_file($ruta_temporal,$ruta.$imagen)){
            //capturamos el nombre de la categoria
            $nombre=$_POST['Nombre'];
            //insertamos la categoria
            $sql="INSERT INTO categorias (nombre,imagen) VALUES ('$nombre','$imagen')";
            $result=$conn->query($sql);
            if($result){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 3;
        }

       
    }else{
        echo 4;
    }
  
}elseif(isset($_POST['accion']) && $_POST['accion']== "cargarCategorias"){
    //cargar categorias
    $sql="SELECT * FROM categorias";
    $result=$conn->query($sql);
    $categorias=array();
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $categorias[]=$row;
        }
        echo json_encode($categorias);
    }else{
        echo 0;
    }
}



?>