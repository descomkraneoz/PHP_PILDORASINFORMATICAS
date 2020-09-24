<?php

    require "devuelveProductos.php";

    $pais=$_GET["buscar"];

    $productos = new devuelveProductos();

    $array_productos=$productos->get_productos($pais);//busca y guarda en una variable los productos en la tabla

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<body>

    <?php

        foreach ($array_productos as $elemento){ //recorremos la variable mostrando los productos de la tabla

            /*echo "<table><tr><td>";
            echo $elemento['SECCIÓN'] . "</td><td>";
            echo $elemento['NOMBRE_ARTÍCULO'] . "</td><td>";
            echo $elemento['FECHA'] . "</td><td>";
            echo $elemento['PAÍS_DE_ORIGEN'] . "</td><td>";
            echo $elemento['PRECIO'] . "</td><td></tr></table>";
            echo "<br>";
            echo "<br>";*/

            var_dump($elemento); //var_dump muestra los datos de manera interesante

        }

    ?>
    
</body>
</html>

