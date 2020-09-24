<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for</title>
</head>
<body>

<?php

echo "<h2>Ejemplo de break en el bucle for</h2>";

for ($i=0; $i <10 ; $i++) { 
    echo "Hemos entrado en el bucle ". ($i+1) . " vuelta<br>";

    if($i==6){
        echo "Hemos interrumpido el bucle en la vuelta " . ($i+1);
    break;
    }

}

echo "<p>Hemos salido del bucle </p>";

echo "<p>------------------------------------------</p>";

echo "<h2>Tabla del 9</h2>";

for ($i=0; $i <= 10 ; $i++) { 

    echo "9 x $i =  ". 9*$i . "<br>";    

}

echo "<p>Hemos salido del bucle </p>";

echo "<p>------------------------------------------</p>";

echo "<h2>Dividir con el 9, ejemplo de continue</h2>";

for ($i=10; $i >= -10 ; $i--) {
    
    if ($i==0) {
        echo "División por 0 no es posible </br>";
        continue;
    }
    echo "9 / $i = " . 9/$i . "</br>";

}

echo "<p>Hemos salido del bucle </p>";

?>
    
</body>
</html>