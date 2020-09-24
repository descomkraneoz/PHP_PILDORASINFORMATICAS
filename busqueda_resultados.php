<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de busqueda mas resultados</title>
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
    <?php

        function ejecuta_consulta($labusqueda) {

        require("datos_conexion.php");

        $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port); 

        if(mysqli_connect_errno()){
            echo "Fallo al conectar con la BBDD";
            exit();
        }   

        mysqli_set_charset($conexion, "utf8");
    
        $consulta="select * from artículos where NOMBRE_ARTÍCULO like '%$labusqueda%'";


        $resultados=mysqli_query($conexion, $consulta);
    
        while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){ 
        
            echo "<table><tr><td>";
            //Debemos poner el nombre de los campos de la tabla tal cual aparecen en la tabla
            echo $fila['SECCIÓN'] . "</td><td>";
            echo $fila['NOMBRE_ARTÍCULO'] . "</td><td>";
            echo $fila['FECHA'] . "</td><td>";
            echo $fila['PAÍS_DE_ORIGEN'] . "</td><td>";
            echo $fila['PRECIO'] . "</td></td></tr></table>";

            echo "<br>";     

        }
    
        mysqli_close($conexion);

        }

    ?>
</head>
<body>
    <?php

        $mibusqueda=$_GET["buscar"];

        $mipag=$_SERVER["PHP_SELF"];

        if ($mibusqueda!=null) {
            ejecuta_consulta($mibusqueda);
        }else{
            echo ("<form action='" . $mipag . "' method='get'>
            <label>Buscar: <input type='text' name='buscar'></label>
            <input type='submit' name='enviado' value='Dale!'>            
            </form>");
        }

    ?>    
</body>
</html>