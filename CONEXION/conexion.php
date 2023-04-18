<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proyectoweb';


$conn = mysqli_connect($localhost, $username, $password, $dbname);
	
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

?>