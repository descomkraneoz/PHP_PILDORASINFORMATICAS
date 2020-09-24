<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de actualización</title>
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

    $busqueda=$_GET["buscar"]; //almacenamos en una variable lo que pasamos desde el formulario

    require("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port); 

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }   

    mysqli_set_charset($conexion, "utf8");
    
    $consulta="select * from artículos where NOMBRE_ARTÍCULO like '%$busqueda%'";


    $resultados=mysqli_query($conexion, $consulta);
    
    while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){ 
        
        //echo "<table><tr><td>";
        echo "<form action='actualizar_registro.php' method='get'>";

        echo "<input type='text' name='seccion' value='" . $fila['SECCIÓN'] . "'><br>";
        echo "<input type='text' name='n_art' value='" . $fila['NOMBRE_ARTÍCULO'] . "'><br>";
        echo "<input type='text' name='fecha' value='" . $fila['FECHA'] . "'><br>";
        echo "<input type='text' name='p_orig' value='" . $fila['PAÍS_DE_ORIGEN'] . "'><br>";
        echo "<input type='text' name='precio' value='" . $fila['PRECIO'] . "'><br>";

        echo "<input type='submit' name='enviando' value='Actualizar!'>";

        echo "</form><br>";     

    }
    
    mysqli_close($conexion);

?>

</body>
</html>