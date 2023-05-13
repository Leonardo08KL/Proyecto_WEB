<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proyectoweb';

/** 
$localhost = 'bdc5yk5sduohvjesdllt-mysql.services.clever-cloud.com';
$username = 'udj9z8zbh88avtcu';
$password = 'W8knVoJL7Pwd9vU5KRGC';
$dbname = 'bdc5yk5sduohvjesdllt';
*/

$conn = mysqli_connect($localhost, $username, $password, $dbname);
	
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}


?>