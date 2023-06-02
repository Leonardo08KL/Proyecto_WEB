<?php


if (!(session_status() === PHP_SESSION_NONE)) {
    $email = $_SESSION['correo'];

    $connectionDB = new ConnectionDB();
    
    $sql = " ";

    $sqlConsulta = $connectionDB->consulta($sql);
    
    $sqlConsulta = $sqlConsulta." where c.correo <> '".$_SESSION['correo']."'; ";

    $result = $connectionDB->conexion($sqlConsulta);



} else {

    $connectionDB = new ConnectionDB();
    
    $sql = " ";
    $sqlConsulta = $connectionDB->consulta($sql);
    $sqlConsulta = $sqlConsulta.";";

    $result = $connectionDB->conexion($sqlConsulta);

    
}

?>

<?php

class ConnectionDB
{
    public function consulta($sql)
    {
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
        INNER JOIN estado e on m.ID_estado = e.ID_estado
        INNER JOIN usuario u on ap.ID_usuario = u.ID_usuario
        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario";

        return $sql;
    }

    function conexion($sql)
    {
        require('CONEXION/conexion.php');
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        return $result;
    }
}
?>

