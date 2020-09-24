<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de los productos</title>
    <style>
    td{
        border: 1px dotted #FF0000;
    }
    h3{
        font-weight: bold;
    }
    </style>
</head>
<body>

<table>

    <tr><td><h3>NOMBRE DEL ARTÍCULO</h3></td></tr>

    <?php

        foreach($matrizProductos as $registro){

            echo "<tr><td>" . $registro["NOMBRE_ARTÍCULO"] . "</td></tr>";

        }

    ?>

</table>
    
</body>
</html>