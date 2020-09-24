<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obteniendo registro de artículos. Arrays indexados</title>
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

    require("datos_conexion.php");//usamos los datos contenidos en datos_conexion.php para establecer la conexion

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port); 

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }   

    mysqli_set_charset($conexion, "utf8");
    
    //$consulta="select * from artículos";
    $consulta="select * from artículos where PAÍS_DE_ORIGEN='ESPAÑA'";


    $resultados=mysqli_query($conexion, $consulta);
    
    while (($fila=mysqli_fetch_row($resultados))==true){ 
        
        echo "<table><tr><td>";

        echo $fila[0] . "</td><td>";
        echo $fila[1] . "</td><td>";
        echo $fila[2] . "</td><td>";
        echo $fila[3] . "</td><td>";
        echo $fila[4] . "</td></td></tr></table>";

        echo "<br>";     

    }
    
    mysqli_close($conexion);

?>

</body>
</html>