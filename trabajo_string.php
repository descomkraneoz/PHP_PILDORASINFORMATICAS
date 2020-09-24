<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String</title>
    <style>
    .resaltar{
        color: #F00;
        font-weight:bold;
    }
    </style>

</head>
<body>
<?php

echo "<p class='resaltar'>Esto es un ejemplo de frase</p>";
//otra forma:
    echo "<p class=\"resaltar\">Esto es un ejemplo de frase</p>";

$nombre="Juan";

echo "Hola $nombre";
echo "<br>";

//strcmp: compara string mediante mayusculas y minusculas. Devuelve 1 si no son iguales. 0 si son iguales. 1=True; 0=False;
//strcasecmp: compara valores string ignorando si estan en mayuculas o minusculas. Devuelve 1 si no son iguales. 0 si son iguales. 1=True; 0=False;

echo "<br> Comparamos strings: <br>";

$variable1="Casa";
$variable2="CASA";

$resultado=strcasecmp($variable1,$variable2); //Devuelve 1 si no son iguales. 0 si son iguales.

echo "El resultado es ". $resultado;
echo "<br>";

if($resultado){
    echo "No coinciden";
}else{ 
    echo "Coinciden";
}

echo "<br>";

if(!$resultado){
    echo "Coinciden";
}else{ 
    echo "No coinciden";
}



?>    
</body>
</html>