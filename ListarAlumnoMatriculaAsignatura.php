<?php

/*vamos a invocar las cabeceras 
para dar permisos de ejecucion a los 
llamados de la API dedesde cualquier aplicacion*/

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE,OPTIONS');
header('Access-Control-Max-Age:100');
header('Access-Control-Allow-Headers:Origin, Content-Type, X-Auth-Token, Authorization');


/*creamos metodo para consultar todos los registros*/

include'../Conexion/ParametrosDB.php';

// abrimos la conexion
$connetion = new mysqli($hostName,$hostUser,$hostPass,$databaseName);

//valido si la conexion es correcta
if($connetion->connect_error){

    die("La conexion no se pudo realizar: ".$connetion->connect_error);

}else{
// se crea consulta
$sql="SELECT  * FROM alumno_se_matricula_asignatura"; // prepara la consulta
$result=$connetion->query($sql);//Se ejecuta la consulta
//verficamos si devuelve datos o no
if ($result->num_rows>0){
    while($row[]=$result->fetch_assoc()){
        $item=$row;
        $json=json_encode($item);
    }

} else{

    echo "No hay registros para mostrar";
}

echo $json;
$connetion->close();


}


?>