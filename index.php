<?php

//Configuracion de host
$host = "localhost";
$usuario = "root";
$password = "";
$basededatos = "api";

//Conexion a Base de datos
$conexion = new mysqli($host, $usuario, $password, $basededatos);

//Prueba conexion a base de datos
if($conexion -> connect_error){
    die ("Conexion no establecida". $conexion -> connect_error);

}

//Recibiendo informacion a traves de una solicitud 
//Devolver un archivo json con la informacion 
header("Content-Type: application/json");
//Asegurar que se debuelva el formato
//La forma en la que el servidor o la api recibe los datos 
$metodo = $_SERVER['REQUEST_METHOD'];
//Para saber que metodo viene o informacion podemos utilizar para canalizar
print_r($metodo);

switch ($metodo){
    //SELECT
    case 'GET':
        echo "Consulta de registros - GET";
        break;
    //INSERT
    case 'POST':
        echo "Consulta el registro - POST";
        break;
    //UPDATE
    case 'PUT':
        echo "Consulta el registro - PUT";
        break;
    //DELETE
    case 'DELETE':
        echo "Consulta el registro - DELETE";
        break;
    default:
        echo "Consulta no valida";
}

?>
