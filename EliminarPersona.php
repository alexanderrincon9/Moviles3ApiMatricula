<?php
// Invocar las cabeceras para darles permisos
// de ejecucion a los llamados de la API desde cualquier aplicacion

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');



include '../conexion/ParametrosBD.php';

// vamos a abrir la conexion

$com = mysqli_connect($HostName,$HostUser,$HostPass,$Databasename);

// ahora vamos a validar si la conexion es correcta o no

$json = file_get_contents('php://input'); //datos de entrada

// decodifcando los datos formato JSON en la variable $obj

$obj = json_decode($json, true);// se prepare para recibir los formatos en json

// vamoas a cerea las variables para enviar los datos de los campos de la tabla de la siguiente manera


$eid=$obj['id'];

// ahora agragamos la instruccion SQL  para eliminar

$sql_query ="DELETE from persona WHERE id = '$eid'";

  //ahora vamos a ejecutar la instruccion SQL anterior

  if (mysqli_query($com,$sql_query)){

$mensaje ="La persona Eliminada con Exito";
$json = json_encode($mensaje);
echo $json;
  } else {

    echo "ERROR";
    }
    // Cerramos conexion
    mysqli_close($com);

?>