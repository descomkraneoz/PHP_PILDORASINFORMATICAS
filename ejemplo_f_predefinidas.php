<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones predefinidas</title>
</head>
<body>
<?php

    $palabra="juan";

    echo ("En minúsculas: ". strtolower($palabra). "<br>");
    echo ("En mayúsculas: ". strtoupper($palabra) . "<br>");
    echo ("En mayúsculas la primera: ". ucwords($palabra) . "<br>");

    echo "----------------------------------</br>";

    echo "<h2>Función Suma:</h2>";

    function suma($num1,$num2){
        $resultado=$num1+$num2;

        return $resultado;
    }

    //llamamos a la función y la imprimimos por pantalla
    echo (suma(5,7));


?>
    
</body>
</html>