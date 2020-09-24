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

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port); // he tenido que poner el puerto o no conectaba

    //$conexion=mysqli_connect($db_host, $db_usuario, $db_contra);//no hace falta el puerto en este caso, el nombre de la BBDD lo pongo en otra linea

    if(mysqli_connect_errno()){//cuando ocurre algun error esta función se dispara
        echo "Fallo al conectar con la BBDD";
        exit();
    }

    //mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
    /*sirve para especificar en otra linea el nombre de la BBDD y si no la encuentra
    lanzar un mensaje de error, para ello $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
    quedaria tal que asi, la conexion si la realiza */

    mysqli_set_charset($conexion, "utf8");//sirve para que reconozca los caracteres latinos y muestre los acentos por ejemplo.

    //$conexion=new mysqli($db_host, $db_usuario, $db_contra, $db_nombre, "3308"); otra forma de hacer la conexion
    

    $consulta="select * from datos_usuario";

    $resultados=mysqli_query($conexion, $consulta);
    
    while (($fila=mysqli_fetch_row($resultados))==true){

        //$fila=mysqli_fetch_row($resultados);//cada vez que llamo a esta función accedo a una linea diferente de la BBDD, la primera vez al registro 1, la segunda al 2 y asi sucesivamente

        echo $fila[0] . " - ";
        echo $fila[1] . " - ";
        echo $fila[2] . " - ";
        echo $fila[3] . "  ";
        echo "<br>";     

    }
    
    mysqli_close($conexion);//cerramos la conexion

?>

</body>
</html>