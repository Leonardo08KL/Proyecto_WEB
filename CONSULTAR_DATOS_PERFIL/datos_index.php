<?php

require('CONEXION/conexion.php');



$sql = "SELECT ap.ID_oferta, ap.Nombre_oferta, ap.Descripcion, ap.Rango_maximo, ap.Rango_minimo,
                cc.Nombre_categoria, cc.descripcion,
                d.Direccion,
                l.localidad,
                m.municipio,
                e.estado
FROM actividad_profesional ap
    INNER JOIN catalogo_categoria cc on ap.ID_categoria = cc.ID_categoria
    INNER JOIN direccion d on ap.ID_oferta = d.ID_oferta
    INNER JOIN localidad l on d.ID_localidad = l.ID_localidad
    INNER JOIN municipio m on l.ID_municipio = m.ID_municipio
    INNER JOIN estado e on m.ID_estado = e.ID_estado;;";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
