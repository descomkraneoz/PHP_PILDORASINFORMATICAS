<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leer imagen de la BBDD</title>
</head>
<body>
    <?php

    require("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

    if (mysqli_connect_errno()) {

        echo("Fallo al conectar con la BBDD");

        exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    mysqli_set_charset($conexion, "utf8");

    $consulta="SELECT FOTO FROM ARTÍCULOS WHERE NOMBRE_ARTÍCULO='Tubos'";

    $resultado=mysqli_query($conexion, $consulta);

    while ($fila=mysqli_fetch_array($resultado)) {

        $ruta_img=$fila['FOTO'];
    }

    ?>

    <div>
        <img src="/intranet/uploads/<?php echo $ruta_img;?>" alt="Imagen del primer artículo" width="25%" />
    </div>
</body>
</html>