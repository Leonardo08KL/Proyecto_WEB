<?php
session_start();
require("../CONEXION/conexion.php");


if (isset($_POST['boton'])) {
    if ($_POST['boton'] == 1) {

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $nombre_archivo = $_FILES['imagen']['name'];
            $tipo_archivo = $_FILES['imagen']['type'];
            $tamano_archivo = $_FILES['imagen']['size'];
            $ruta_temporal = $_FILES['imagen']['tmp_name'];
          
            // Mueve el archivo a una carpeta en tu servidor
            $carpeta_destino = '../uploads/';
            $ruta_destino = $carpeta_destino . $nombre_archivo;
            move_uploaded_file($ruta_temporal, $ruta_destino);

            $sql = "UPDATE usuario U
            INNER JOIN cuenta c on U.ID_usuario = c.ID_usuario
            SET Foto = '".$nombre_archivo."'
            WHERE c.correo = '". $_SESSION['correo']."'";

            sqlConn($conn, $sql);
          } else {
            echo "Error al subir el archivo.";
          }

    } elseif ($_POST['boton'] == 2) {

        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $telefono = $_POST['telefono'];
        $nacimiento = $_POST['nacimiento'];
        $genero = ($_POST['genero'] === 'MASCULINO') ? 1 : 2;

        $sql = "UPDATE usuario u
                INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                SET
                    u.Nombre = '" . $nombre . "',
                    u.A_paterno = '" . $apellido_paterno . "',
                    u.A_materno = '" . $apellido_materno . "',
                    u.Telefono = '" . $telefono . "',
                    u.Nacimiento = '" . $nacimiento . "',
                    u.ID_genero = " . $genero . "
                WHERE c.correo = '" . $_SESSION['correo'] . "'";


        sqlConn($conn, $sql);
    } elseif ($_POST['boton'] == 3) {

        $estado = $_POST['cbx_estado'];
        $municipio = $_POST['cbx_municipio'];
        $localidad = $_POST['cbx_localidad'];

        $sql = "UPDATE usuario u
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        SET
            u.ID_localidad = " . $localidad . "
        WHERE c.correo = '" . $_SESSION['correo'] . "'";

        sqlConn($conn, $sql);
    } elseif ($_POST['boton'] == 4) {

        $contrasenaAnterior = $_POST['contrasenaAnterior'];
        $contrasenaNueva = $_POST['contrasenaNueva'];

        $sql = "SELECT contrasena
                    FROM cuenta
                WHERE correo = '" . $_SESSION['correo'] . "';";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $password_encriptada = $row['contrasena'];
        }

        $contrasena_encriptada_usuario = md5($contrasenaAnterior);


        if ($contrasena_encriptada_usuario == $password_encriptada) {
            // la contraseña es válida
            // iniciar sesión del usuario aqui

            $sql = "UPDATE cuenta c
                    set contrasena = md5('".$contrasenaNueva."')
                    WHERE correo = '" . $_SESSION['correo'] . "';";

                    sqlConn($conn, $sql);

            header('Location: ../EditarDatos.php?enviado=true');
            exit;
        } else {
            header('Location: ../EditarDatos.php?enviado=false');
            exit;
        }
    } elseif ($_POST['boton'] == 5) { 

        $institucion = $_POST['institucion'];
        $fecha_ingreso = $_POST['fecha_ingreso_institucion'];
        $fecha_egreso = $_POST['fecha_egreso_institucion'];
        $descripcion = $_POST['descripcion'];

        $sql = "UPDATE nivel_estudios ne
        INNER JOIN usuario u on ne.ID_usuario = u.ID_usuario
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        SET ne.institucion = '".$institucion."',
            ne.fecha_ingreso = '".$fecha_ingreso."',
            ne.fecha_egreso = '".$fecha_egreso."',
            ne.descripcion = '".$descripcion."'
        WHERE c.correo = '" . $_SESSION['correo'] . "'";


        sqlConn($conn, $sql);

    } elseif ($_POST['boton'] == 6) { 

        $ID_Experiencia = $_POST['ID_Experiencia'];
        $nombreExp = $_POST['nombreExp'];
        $fecha_ingreso_Exp = $_POST['fecha_ingreso_Exp'];
        $fecha_egreso_Exp = $_POST['fecha_egreso_Exp'];
        $descripcionExp = $_POST['descripcionExp'];

        $sql = "UPDATE experiencia_laboral el
        INNER JOIN usuario u on el.ID_usuario = u.ID_usuario
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        SET el.Nombre_experiencia = '".$nombreExp."',
            el.Fecha_egreso = '".$fecha_ingreso_Exp."',
            el.Fecha_ingreso = '".$fecha_egreso_Exp."',
            el.Descripcion = '".$descripcionExp."'
        WHERE el.ID_experiencia = " . $ID_Experiencia. ";";

        sqlConn($conn, $sql);

    }
} else {
    header("Location: ../index.php");
    exit();
}


function sqlConn($conn, $sql)
{
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    mysqli_close($conn);

    header('Location: ../EditarDatos.php?enviado=true');
    exit;
}
