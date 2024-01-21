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

switch ($metodo){
    //SELECT
    case 'GET':
        consulta($conexion);
        break;
    //INSERT
    echo " Insertar registro - POST";
    case 'POST':
        insertar($conexion);
        break;
    //UPDATE
    case 'PUT':
        echo " Actualizar registro - PUT";
        break;
    //DELETE
    case 'DELETE':
        echo "Eliminando registro - DELETE";
        break;
    default:
        echo "Consulta no valida";
}

//Funcion para hacer una consulta
function consulta($conexion){
    $sql = "SELECT * FROM  usuarios";
    $resultado = $conexion->query($sql);

    if($resultado){
        $datos = array();
        while($fila= $resultado ->fetch_assoc()){
            $datos[] = $fila;

        }
        echo json_encode($datos);
    }

}

function insertar($conexion){
    $dato = json_decode(file_get_contents('php://input'),true);
    $nombre = $dato['nombre'];
    // print_r($nombre);

    $sql = "INSERT INTO usuarios(nombre) VALUE ('$nombre')";
    $resultado = $conexion->query($sql);

    if($resultado){
        $dato['id'] = $conexion->insert_id;
        echo json_encode($dato);
    }else{
        echo json_encode(array('error' => 'Error al crear el usuario'));
    }
}

?>
