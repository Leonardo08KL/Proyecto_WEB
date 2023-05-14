<?php
require('CONEXION/conexion.php');

if (session_status() == PHP_SESSION_NONE) {

    $sql = "SELECT c.correo,
    u.nombre ,
    u.A_paterno ,
    u.A_materno ,
    concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
    u.Nacimiento,
    u.Telefono,
    l.localidad,
    m.municipio,
    e.estado,
    cg.genero,
    u.Foto,
    ne.institucion,
    ne.fecha_ingreso,
    ne.fecha_egreso,
    ne.descripcion
    from cuenta c
    inner join usuario u on c.ID_usuario = u.ID_usuario
    inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
    inner join localidad l on u.ID_localidad = l.ID_localidad
    inner join municipio m on l.ID_municipio = m.ID_municipio
    inner join estado e on m.ID_estado = e.ID_estado
    inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";

    $sqlExperiencia = "SELECT el.ID_experiencia, el.Nombre_experiencia, el.Fecha_ingreso, el.Fecha_egreso, el.Descripcion
    FROM experiencia_laboral el
    INNER JOIN usuario u on el.ID_usuario = u.ID_usuario
    INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";

    $result = mysqli_query($conn, $sql);

    $resultExperiencia = mysqli_query($conn, $sqlExperiencia);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    if (!$resultExperiencia) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Obtener el resultado de la consulta
    while ($row = mysqli_fetch_assoc($result)) {
        // Acceder a los valores de cada fila
        $correo = $row["correo"];
        $nombre = $row["nombre"];
        $a_paterno = $row["A_paterno"];
        $a_materno = $row["A_materno"];
        $nombre_completo = $row["NOMBRE_COMPLETO"];
        $nacimiento = $row["Nacimiento"];
        $telefono = $row["Telefono"];
        $localidad = $row["localidad"];
        $municipio = $row["municipio"];
        $estado = $row["estado"];
        $genero = $row["genero"];
        $foto = $row["Foto"];
        $institucion = $row["institucion"];
        $fecha_ingreso = $row["fecha_ingreso"];
        $fecha_egreso = $row["fecha_egreso"];
        $descripcion = $row["descripcion"];
    }


    /**
    while ($row = mysqli_fetch_assoc($resultExperiencia)) {
    // Acceder a los valores de cada fila
    $Nombre_experiencia = $row['Nombre_experiencia'];
    $fecha_ingresoExp = $row['Fecha_ingreso'];
    $fecha_egresoExp = $row['Fecha_egreso'];
    $descripcionExp = $row['Descripcion'];
    }
    
    
     */
    function datos_actividad_profesional()
    {
        $sql = "SELECT c.correo,
    u.nombre ,
    u.A_paterno ,
    u.A_materno ,
    concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
    u.Nacimiento,
    u.Telefono,
    l.localidad,
    m.municipio,
    e.estado,
    cg.genero,
    u.Foto,
    ne.institucion,
    ne.fecha_ingreso,
    ne.fecha_egreso,
    ne.descripcion
    from cuenta c
    inner join usuario u on c.ID_usuario = u.ID_usuario
    inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
    inner join localidad l on u.ID_localidad = l.ID_localidad
    inner join municipio m on l.ID_municipio = m.ID_municipio
    inner join estado e on m.ID_estado = e.ID_estado
    inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";
    }
    mysqli_close($conn);
} else {

    $email = $_SESSION['correo'];
    if (isset($_GET['ID'])) {


        $sql = "SELECT c.correo,
    u.nombre ,
    u.A_paterno ,
    u.A_materno ,
    concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
    u.Nacimiento,
    u.Telefono,
    l.localidad,
    m.municipio,
    e.estado,
    cg.genero,
    u.Foto,
    ne.institucion,
    ne.fecha_ingreso,
    ne.fecha_egreso,
    ne.descripcion
    from cuenta c
    inner join usuario u on c.ID_usuario = u.ID_usuario
    inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
    inner join localidad l on u.ID_localidad = l.ID_localidad
    inner join municipio m on l.ID_municipio = m.ID_municipio
    inner join estado e on m.ID_estado = e.ID_estado
    inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";

        $sqlExperiencia = "SELECT el.ID_experiencia, el.Nombre_experiencia, el.Fecha_ingreso, el.Fecha_egreso, el.Descripcion
    FROM experiencia_laboral el
    INNER JOIN usuario u on el.ID_usuario = u.ID_usuario
    INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";

        $result = mysqli_query($conn, $sql);

        $resultExperiencia = mysqli_query($conn, $sqlExperiencia);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        if (!$resultExperiencia) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        // Obtener el resultado de la consulta
        while ($row = mysqli_fetch_assoc($result)) {
            // Acceder a los valores de cada fila
            $correo = $row["correo"];
            $nombre = $row["nombre"];
            $a_paterno = $row["A_paterno"];
            $a_materno = $row["A_materno"];
            $nombre_completo = $row["NOMBRE_COMPLETO"];
            $nacimiento = $row["Nacimiento"];
            $telefono = $row["Telefono"];
            $localidad = $row["localidad"];
            $municipio = $row["municipio"];
            $estado = $row["estado"];
            $genero = $row["genero"];
            $foto = $row["Foto"];
            $institucion = $row["institucion"];
            $fecha_ingreso = $row["fecha_ingreso"];
            $fecha_egreso = $row["fecha_egreso"];
            $descripcion = $row["descripcion"];
        }


        /**
    while ($row = mysqli_fetch_assoc($resultExperiencia)) {
    // Acceder a los valores de cada fila
    $Nombre_experiencia = $row['Nombre_experiencia'];
    $fecha_ingresoExp = $row['Fecha_ingreso'];
    $fecha_egresoExp = $row['Fecha_egreso'];
    $descripcionExp = $row['Descripcion'];
    }
    
    
         */
        function datos_actividad_profesional()
        {
            $sql = "SELECT c.correo,
    u.nombre ,
    u.A_paterno ,
    u.A_materno ,
    concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
    u.Nacimiento,
    u.Telefono,
    l.localidad,
    m.municipio,
    e.estado,
    cg.genero,
    u.Foto,
    ne.institucion,
    ne.fecha_ingreso,
    ne.fecha_egreso,
    ne.descripcion
    from cuenta c
    inner join usuario u on c.ID_usuario = u.ID_usuario
    inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
    inner join localidad l on u.ID_localidad = l.ID_localidad
    inner join municipio m on l.ID_municipio = m.ID_municipio
    inner join estado e on m.ID_estado = e.ID_estado
    inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
    inner join actividad_profesional ap on u.ID_usuario = ap.ID_usuario
    where ap.ID_oferta = " . $_GET['ID'] . ";";
        }
        mysqli_close($conn);
    } else {




        require('CONEXION/conexion.php');

        $sql = "SELECT c.correo,
                    u.nombre ,
                    u.A_paterno ,
                    u.A_materno ,
                    concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
                    u.Nacimiento,
                    u.Telefono,
                    l.localidad,
                    m.municipio,
                    e.estado,
                    cg.genero,
                    u.Foto,
                    ne.institucion,
                    ne.fecha_ingreso,
                    ne.fecha_egreso,
                    ne.descripcion
                from cuenta c
                    inner join usuario u on c.ID_usuario = u.ID_usuario
                    inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
                    inner join localidad l on u.ID_localidad = l.ID_localidad
                    inner join municipio m on l.ID_municipio = m.ID_municipio
                    inner join estado e on m.ID_estado = e.ID_estado
                    inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
                where correo = '" . $email . "';";

        $sqlExperiencia = "SELECT el.ID_experiencia, el.Nombre_experiencia, el.Fecha_ingreso, el.Fecha_egreso, el.Descripcion
                            FROM experiencia_laboral el
                        INNER JOIN usuario u on el.ID_usuario = u.ID_usuario
                        INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                        WHERE c.correo = '" . $_SESSION['correo'] . "';";

        $result = mysqli_query($conn, $sql);

        $resultExperiencia = mysqli_query($conn, $sqlExperiencia);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        if (!$resultExperiencia) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        // Obtener el resultado de la consulta
        while ($row = mysqli_fetch_assoc($result)) {
            // Acceder a los valores de cada fila
            $correo = $row["correo"];
            $nombre = $row["nombre"];
            $a_paterno = $row["A_paterno"];
            $a_materno = $row["A_materno"];
            $nombre_completo = $row["NOMBRE_COMPLETO"];
            $nacimiento = $row["Nacimiento"];
            $telefono = $row["Telefono"];
            $localidad = $row["localidad"];
            $municipio = $row["municipio"];
            $estado = $row["estado"];
            $genero = $row["genero"];
            $foto = $row["Foto"];
            $institucion = $row["institucion"];
            $fecha_ingreso = $row["fecha_ingreso"];
            $fecha_egreso = $row["fecha_egreso"];
            $descripcion = $row["descripcion"];
        }


        /**
     while ($row = mysqli_fetch_assoc($resultExperiencia)) {
        // Acceder a los valores de cada fila
        $Nombre_experiencia = $row['Nombre_experiencia'];
        $fecha_ingresoExp = $row['Fecha_ingreso'];
        $fecha_egresoExp = $row['Fecha_egreso'];
        $descripcionExp = $row['Descripcion'];
    }


         */
        function datos_actividad_profesional()
        {
            $sql = "SELECT c.correo,
        u.nombre ,
        u.A_paterno ,
        u.A_materno ,
        concat(u.Nombre,' ',u.A_paterno,' ',u.A_materno) AS NOMBRE_COMPLETO,
        u.Nacimiento,
        u.Telefono,
        l.localidad,
        m.municipio,
        e.estado,
        cg.genero,
        u.Foto,
        ne.institucion,
        ne.fecha_ingreso,
        ne.fecha_egreso,
        ne.descripcion
    from cuenta c
        inner join usuario u on c.ID_usuario = u.ID_usuario
        inner join catalogo_genero cg on u.ID_genero = cg.ID_genero
        inner join localidad l on u.ID_localidad = l.ID_localidad
        inner join municipio m on l.ID_municipio = m.ID_municipio
        inner join estado e on m.ID_estado = e.ID_estado
        inner join nivel_estudios ne on u.ID_usuario = ne.ID_usuario
    where correo = '" . $_SESSION['correo'] . "';";
        }
        mysqli_close($conn);
    }
}
