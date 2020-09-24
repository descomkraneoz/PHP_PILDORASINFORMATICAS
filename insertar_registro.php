<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Registros</title>
    <style>
            table {
                border: none;
                width: 100%;
                border-collapse: collapse;
            }

            td {
                width: 20%; 
                padding: 5px 10px;
                text-align: center;
                border: 1px solid #999;
            }

            tr:nth-child(1) {
                background: #dedede;
            }
        </style>
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
    $consulta="insert into artículos (SECCIÓN, NOMBRE_ARTÍCULO, FECHA, PAÍS_DE_ORIGEN, PRECIO) values ('$seccion', '$nombre_articulo', '$fecha', '$pais', '$precio')";

    $resultados=mysqli_query($conexion, $consulta);
    
    if ($resultados==false) {
        echo "Error en la consulta";
    }else {
        echo "Registro guardado <br><br>";
        echo "<table><tr><td>$nombre_articulo</td></tr>";
        echo "<tr><td>$seccion</td></tr>";
        echo "<tr><td>$fecha</td></tr>";
        echo "<tr><td>$pais</td></tr>";
        echo "<tr><td>$precio</td></tr></table>";


    }
    
    mysqli_close($conexion);
    ?>
</body>
</html>
