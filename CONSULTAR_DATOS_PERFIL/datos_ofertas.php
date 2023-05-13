<?php

require('CONEXION/conexion.php');

$Nombre_oferta = '';


if ($_GET['datos'] == 'Ofertas') {
    
$email = $_SESSION['correo'];

    $sql = "SELECT ap.ID_oferta, ap.Nombre_oferta, u.Nombre, cc.Nombre_categoria, cc.descripcion
    FROM actividad_profesional ap
        INNER JOIN usuario u on ap.ID_usuario = u.ID_usuario
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        INNER JOIN catalogo_categoria cc on ap.ID_categoria = cc.ID_categoria
    WHERE c.correo = '" . $email . "';";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // while ($row = mysqli_fetch_assoc($result)) {

    //     $ID_oferta = $row['ID_oferta'];
    //     $Nombre_oferta = $row['Nombre_oferta'];
    //     $Nombre = $row['Nombre'];
    //     $Nombre_categoria  = $row['Nombre_categoria'];
    //     $descripcion = $row['descripcion'];
    // }

    
} elseif ($_GET['datos'] == 'Oferta') {



    $sql = "SELECT ap.Nombre_oferta, ap.Descripcion, ap.Rango_maximo, ap.Rango_minimo, ap.Telefono_contacto,
    cc.Nombre_categoria,cc.descripcion,
    concat(u.Nombre,' ', u.A_paterno,' ',u.A_materno, Foto) as Nombre,
    d.Direccion, l.localidad, m.municipio, e.estado
    FROM actividad_profesional ap
        INNER JOIN catalogo_categoria cc on ap.ID_categoria = cc.ID_categoria
        INNER JOIN direccion d on ap.ID_oferta = d.ID_oferta
        INNER JOIN usuario u on ap.ID_usuario = u.ID_usuario
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
        INNER JOIN localidad l on d.ID_localidad = l.ID_localidad
        INNER JOIN municipio m on l.ID_municipio = m.ID_municipio
        INNER JOIN estado e on m.ID_estado = e.ID_estado
    WHERE ap.ID_oferta = ".$_GET['ID'].";";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)) {

        $Nombre_oferta = $row['Nombre_oferta'];
        $Descripcion = $row['Descripcion'];
        $Rango_maximo = $row['Rango_maximo'];
        $Rango_minimo  = $row['Rango_minimo'];
        $Telefono_contacto = $row['Telefono_contacto'];
        $Nombre_categoria = $row['Nombre_categoria'];
        $descripcionCatOferta = $row['descripcion'];
        $Nombre = $row['Nombre'];
        $Direccion = $row['Direccion'];
        $localidad = $row['localidad'];
        $municipio = $row['municipio'];
        $estado = $row['estado'];
    }
}

function consulta($conn, $sql)
{
}

function getDatos($result, $conn)
{
}
