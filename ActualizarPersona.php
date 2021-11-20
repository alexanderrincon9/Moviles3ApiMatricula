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
$connetion = mysqli_connect ($hostName,$hostUser,$hostPass,$databaseName);
//valido si la conexion es correcta
$json=file_get_contents('php://input');
//Decodifico los datos formato JSON en la variable %obj
$obj = json_decode($json,true);
//Se crean las variables para enviar los datos de los campos
$id=$obj['id'];
$nif=$obj['nif'];  
$nombre=$obj['nombre'];  
$apellido1=$obj['apellido1'];  
$apellido2=$obj['apellido2'];  
$ciudad=$obj['ciudad'];  
$direccion=$obj['direccion'];  
$telefono=$obj['telefono'];  
$fecha_nacimiento=$obj['fecha_nacimiento'];  
$sexo=$obj['sexo'];  
$tipo=$obj['tipo']; 
$clave=$obj['clave'];
//se insertan datos a la bd
$sql_query="UPDATE persona SET 
nif = '$nif',
nombre = '$nombre',
apellido1 = '$apellido1',
apellido2 = '$apellido2',
ciudad = '$ciudad',
direccion = '$direccion',
telefono = '$telefono',
fecha_nacimiento ='$fecha_nacimiento',
sexo ='$sexo',
tipo = '$tipo',
clave = '$clave'
WHERE id = $id";
// se ejecuta la isntruccion SQL
if(mysqli_query($connetion,$sql_query)){
    $mesaje ="Registro Actualizado";
    $json=json_encode($mesaje);
    echo $json;
}else{
    echo "Error almacenando...";
    }
//cerramos la conexion
mysqli_close($connetion);

