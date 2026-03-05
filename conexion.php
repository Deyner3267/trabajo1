<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "inventary";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}

?>