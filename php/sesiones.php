<?php
require('../admin/config/conexion.php');
//capturamos los imput del formulario con post
if (isset($_POST['Nombre']) && $_POST['Nombre']!=""  && $_POST['Correo']!=""  && $_POST['Tel']!=""  && $_POST['Dirección']!=""  && $_POST['contraseña']!=""  && $_POST['confirmar_contraseña']!="") {
    $nombre = $_POST['Nombre'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Tel'];
    $direccion = $_POST['Dirección'];
    $contraseña= $_POST['contraseña'];
    $confirmar= $_POST['confirmar_contraseña'];

       //validamos si las constraseñas son iguales
       if($contraseña==$confirmar){
            $contrasenaEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);
            //validamos si el correo ya esta registrado
            $sql = "SELECT * FROM clientes WHERE email = '$correo'";
            $result = $conn->query($sql);
            //si en el resultado el numero de filas es mayor a 0
            if ($result->num_rows > 0) {
                echo 1; // el correo ya existe
                exit;
            }


            //insertamos los datos en la base de datos
            $sql = "INSERT INTO clientes (nombre, email, telefono, direccion, contraseña) VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$contrasenaEncriptada')";
            $resultado = mysqli_query($conn, $sql);
            //validamos si se inserto correctamente
            if($resultado){
                echo 2;// se inserto correctamente

            }else{
                echo 3; // error al registrar
            }
        }else{
        echo 4; //las contrase;as no coinciden
        }

        

}else{
    echo 5; //error al enviar los datos
}



?>