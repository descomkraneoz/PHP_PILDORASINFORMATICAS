<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones matematicas</title>
</head>
<body>
<?php

    echo "Función rand() : <br>";

    $num1=rand();

    echo "El número es: " . $num1 . "<br>";

    $num2=rand(10 , 50);

    echo "El número es: " . $num2 . "<br><br>";

    echo "Función pow() : <br>";

    $num3=pow(5,3);

    echo "El número es: " . $num3 . "<br><br>";

    echo "Función round() : <br>";

    $num4=5.25215454;

    echo "El número es: " . round($num4,2) . "<br><br>";

    echo "Casting : <br>";

    $num5="5";

    $resultado=(int)$num5;

    echo "El número es: " . $resultado . "<br><br>";

?>
    
</body>
</html>