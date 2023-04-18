<?php 

    $email = $_SESSION['correo'];

    require ('CONEXION/conexion.php');

    $sql = "SELECT c.correo, concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO, u.Nacimiento, u.Telefono, l.localidad, m.municipio,e.estado, cg.genero, u.Foto
        from cuenta c
            inner join usuario u on c.ID_usuario = u.ID_usuario
            inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
            inner join localidad l on u.ID_localidad = l.ID_localidad
            inner join municipio m on l.ID_municipio = m.ID_municipio
            inner join estado e on m.ID_estado = e.ID_estado
        where correo = '".$_SESSION['correo']."';";

    $result = mysqli_query($conn, $sql);

    if (!$result){
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Obtener el resultado de la consulta
    while ($row = mysqli_fetch_assoc($result)) {
        // Acceder a los valores de cada fila
        $correo = $row["correo"];
        $nombre_completo = $row["NOMBRE_COMPLETO"];
        $nacimiento = $row["Nacimiento"];
        $telefono = $row["Telefono"];
        $localidad = $row["localidad"];
        $municipio = $row["municipio"];
        $estado = $row["estado"];
        $genero = $row["genero"];
        $foto = $row["Foto"];
    }


    mysqli_close($conn);

?>