<?php 
session_start();


$nombreOferta = $_POST['nombreOferta'];
$categoria = $_POST['categoriaOferta'];
$txtDescripcion = $_POST['txtDescripcion'];
$Rango_minimo = $_POST['Rango_minimo'];
$Rango_maximo = $_POST['Rango_maximo'];
$telefono_contacto = $_POST['telefono_contacto'];
$cbx_localidad = $_POST['cbx_localidad'];


require ('CONEXION/conexion.php');

$sql = "INSERT INTO actividad_profesional(
    Nombre_oferta, 
    Descripcion, 
    Rango_maximo, 
    Rango_minimo, 
    Telefono_contacto, 
    ID_usuario, 
    ID_localidad)
VALUES ('".$nombreOferta."',
        '".$txtDescripcion."',
        ".$Rango_minimo.",
        ".$Rango_maximo.",
        '".$telefono_contacto."',
        (SELECT u.ID_usuario
             FROM usuario u
             INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
             WHERE c.correo = '".$_SESSION['correo']."'),
        ".$cbx_localidad.")";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        mysqli_close($conn);

        header('Location: ../Oferta_usuarios.php?enviado=true');
        exit();

?>