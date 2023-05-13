<?php
session_start();

if ($_GET['WORK'] == 'Datos_Residencia') {
    echo "uno ";

    $connectionDB = new connectionDB();

    $localidad = $_POST['cbx_localidad'];

    $connectionDB->inserrtar_datos_localidad(
        $localidad
    );

    header("Location: ../SingUp_Datos_Perfil_Profesional.php");
    exit();
}

if ($_GET['WORK'] == 'Datos_Perfil_Profesional') {
    $connectionDB = new connectionDB();

    echo "dos ";

    $institucion = $_POST['institucion'];
    $fecha_ingreso = $_POST['fecha_ingreso_institucion'];
    $fecha_egreso = $_POST['fecha_egreso_institucion'];
    $descripcion = $_POST['descripcion'];

    $connectionDB->insertar_datos_nivel_estudios(
        $institucion,
        $fecha_ingreso,
        $fecha_egreso,
        $descripcion
    );

    header("Location: ../SinUp_Datos_Experiencia_Laboral.php");
    exit();
}

if ($_GET['WORK'] == 'Datos_Experiencia_Laboral') {
    $connectionDB = new connectionDB();

    $nombreExp = $_POST['nombreExp'];
    $fecha_ingreso_Exp = $_POST['fecha_ingreso_Exp'];
    $fecha_egreso_Exp = $_POST['fecha_egreso_Exp'];
    $descripcionExp = $_POST['descripcionExp'];

    $connectionDB->insertar_datos_exp_laboral(
        $nombreExp,
        $fecha_ingreso_Exp,
        $fecha_egreso_Exp,
        $descripcionExp
    );

    if (isset($_POST['boton1'])) {
        if ($_POST['boton1'] == 1) {
            header("Location: ../index.php?enviado=usDone");
            exit();
        }
    }

    if (isset($_POST['boton2'])) {
        if ($_POST['boton2'] == 2) {

            header("Location: ../SinUp_Datos_Experiencia_Laboral.php");
            exit();
        }
    }

    if (isset($_POST['boton3'])) {
        if ($_POST['boton3'] == 1) {
            header("Location: ../EditarDatos.php");
            exit();
        }
    }
}

?>

<?php


class connectionDB
{

    function inserrtar_datos_localidad(
        $localidad
    ) {
        $connectionDB = new connectionDB();

        require('../CONEXION/conexion.php');

        $sql = "UPDATE usuario u
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        SET ID_localidad = " . $localidad . "
        WHERE c.correo = '" . $_SESSION['correo'] . "';";


        $connectionDB->Final_consult($conn, $sql);
    }

    function insertar_datos_nivel_estudios(
        $institucion,
        $fecha_ingreso,
        $fecha_egreso,
        $descripcion
    ) {
        $connectionDB = new connectionDB();

        require('../CONEXION/conexion.php');

        $sql = "INSERT INTO nivel_estudios(institucion, fecha_ingreso, fecha_egreso, descripcion, ID_usuario)
        values ('" . $institucion . "',
                '" . $fecha_ingreso . "',
                '" . $fecha_egreso . "',
                '" . $descripcion . "',
                (SELECT u.ID_usuario FROM usuario u 
                INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                WHERE c.correo = '" . $_SESSION['correo'] . "'));";


        $connectionDB->Final_consult($conn, $sql);
    }

    function insertar_datos_exp_laboral(
        $nombreExp,
        $fecha_ingreso_Exp,
        $fecha_egreso_Exp,
        $descripcionExp
    ) {
        $connectionDB = new connectionDB();

        require('../CONEXION/conexion.php');

        $sql = "INSERT INTO experiencia_laboral(Nombre_experiencia,
                                                Fecha_ingreso,
                                                Fecha_egreso,
                                                Descripcion,
                                                ID_usuario)
                VALUES ('" . $nombreExp . "',
                '" . $fecha_ingreso_Exp . "',
                '" . $fecha_egreso_Exp . "',
                '" . $descripcionExp . "',
                (SELECT u.ID_usuario FROM usuario u 
                INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                WHERE correo = '" . $_SESSION['correo'] . "'));";


        $connectionDB->Final_consult($conn, $sql);
    }

    function Final_consult($conn, $sql)
    {
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        mysqli_close($conn);
    }
}

?>