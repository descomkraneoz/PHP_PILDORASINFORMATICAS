<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obteniendo registro de la BBDD</title>
</head>
<body>
<?php

    $db_host="localhost";
    $db_nombre="prueba_php";
    $db_usuario="root";
    $db_contra="";
    $db_port=3308;

    $mi_conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

    if (mysqli_connect_errno()) {
        print("Error al conectar con la BBDD");
        exit();
    }
    $mi_consulta="select * from datos_usuario";
    $resultado= mysqli_query($mi_conexion, $mi_consulta);
    $fila= mysqli_fetch_row($resultado);
    while ($fila != null) {
        
        foreach ($fila as $var) {
            echo $var . " - ";
        }
        $fila= mysqli_fetch_row($resultado);
        echo "<br>";
    }
    mysqli_close($mi_conexion);

?>

</body>
</html>