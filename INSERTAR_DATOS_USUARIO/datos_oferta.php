<?php
session_start();


$correo = $_SESSION['correo'];
$nombreOferta = $_POST['nombreOferta'];
$categoria = $_POST['categoriaOferta'];
$txtDescripcion = $_POST['txtDescripcion'];
$Rango_minimo = $_POST['Rango_minimo'];
$Rango_maximo = $_POST['Rango_maximo'];
$telefono_contacto = $_POST['telefono_contacto'];
$direccionOferta = $_POST['direccionOferta'];
$cbx_localidad = $_POST['cbx_localidad'];


require('../CONEXION/conexion.php');


$sql = "SELECT Nombre_oferta 
FROM actividad_profesional ap 
INNER JOIN cuenta c on ap.ID_usuario = c.ID_usuario 
WHERE c.correo = '" . $correo . "' and Nombre_oferta = '".$nombreOferta."';";

$ExisteNombreOferta = consulta($conn, $sql);

if ($ExisteNombreOferta == true) {

    $n = 0;

    echo "Hola " . $n;
    /*
    header("Location: ../Oferta.php?enviado=false");
    exit();
*/
} elseif ($ExisteNombreOferta == false) {

    $n = 1;

    echo "Hola " . $n;

    $sql = "INSERT INTO actividad_profesional(
    Nombre_oferta, 
    Descripcion, 
    Rango_maximo, 
    Rango_minimo, 
    Telefono_contacto, 
    ID_usuario, 
    ID_categoria)
    VALUES ('" . $nombreOferta . "',
            '" . $txtDescripcion . "', 
            " . $Rango_maximo . ", 
            " . $Rango_minimo . ",
            '" . $telefono_contacto . "',
            (SELECT u.ID_usuario
            FROM usuario u
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        WHERE correo = '" . $correo . "'),
            " . $categoria . ");";

    insertar($conn, $sql);

    $sql = "INSERT INTO direccion(
            Direccion, 
            ID_localidad, 
            ID_oferta)
            VALUES ('" . $direccionOferta . "',
                " . $cbx_localidad . ",
                (SELECT ID_oferta
                    FROM actividad_profesional ap
                INNER JOIN usuario u on ap.ID_usuario = u.ID_usuario
                INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                WHERE c.correo = '" . $correo . "' and ap.Nombre_oferta = '" . $nombreOferta . "'));";

    insertar($conn, $sql);


    header("Location: ../index.php");
    exit();
    
}


function consulta($conn, $sql)
{
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $registro = mysqli_fetch_array($res);

    if ($registro[0] > 0) {
        $existe = true;
    } else {
        $existe = false;
    }

    return $existe;
}

function insertar($conn, $sql)
{
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}



mysqli_close($conn);
