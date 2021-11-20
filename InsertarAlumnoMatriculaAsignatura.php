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
$id_alumno=$obj['id_alumno'];  
$id_asignatura=$obj['id_asignatura'];  
$id_curso_escolar=$obj['id_curso_escolar'];  

//se insertan datos a la bd
$sql_query="INSERT INTO alumno_se_matricula_asignatura (id_alumno, id_asignatura, id_curso_escolar)
VALUES('$id_alumno','$id_asignatura','$id_curso_escolar')";
// se ejecuta la isntruccion SQL

if(mysqli_query($connetion,$sql_query)){
    $mesaje ="Registro almacenado";
    $json=json_encode($mesaje);
    echo $json;

}else{

    echo "Error almacenando...";

}

//cerramos la conexion
mysqli_close($connetion);

