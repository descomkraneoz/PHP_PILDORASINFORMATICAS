<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registros</title>
</head>
<body>
    <?php
    //almacenamos en variables los valores que el usuario ha introducido en los cuadros del formulario
    $seccion=$_GET["seccion"];
    $nombre_articulo=$_GET["n_art"];
    $fecha=$_GET["fecha"];
    $pais=$_GET["p_orig"];
    $precio=$_GET["precio"];

    require("datos_conexion.php");
    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }
    
    mysqli_set_charset($conexion, "utf8");
    
    //consulta sql
    $consulta="delete from artículos where NOMBRE_ARTÍCULO='$nombre_articulo'";

    $resultados=mysqli_query($conexion, $consulta);
    
    if ($resultados==false) {
        echo "Error en la consulta";
    }else {
        //echo "Registro eliminado <br>";
        //echo mysqli_affected_rows($conexion);
        if (mysqli_affected_rows($conexion)==0) {
            echo "No hay registros que eliminar con ese criterio";
        }elseif (mysqli_affected_rows($conexion)==1) {
            echo "Se ha eliminado " . mysqli_affected_rows($conexion) . " registro";
        }else {
            echo "Se han eliminado " . mysqli_affected_rows($conexion) . " registros";
        }
    }
    
    mysqli_close($conexion);
    ?>
</body>
</html>
