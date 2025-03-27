<?php
require('../admin/config/conexion.php');
$query = "SELECT * FROM categorias";
$result = $conn->query($query);

//recoremos los resultados para mandarlo en tipo json
//creo una variable y lo igualo a un array vacio
$categorias = array();
//creo el while para recorrer cada fla de resultado
//(mientras existan dados asociativos va ser igual a row , x cada resultado que obtenga , lo pasara en el array categ)

while($row = $result->fetch_assoc()){
    $categorias[] = $row;
}
//convierto el array en un json
echo json_encode($categorias);


?>