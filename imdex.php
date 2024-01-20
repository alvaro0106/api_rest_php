<?php

//Configuracion de host
$host = "localhost";
$usuario = "root";
$password = "";
$basededatos = "api";

//Conexion a Base de datos
$conexion = new mysqli($host, $usuario, $password, $basededatos);

//Prueba conexion a base de datos
if($conexion -> connection_error){
    die ("Conexion no establecida". $conexion -> connection_error);

}


?>
