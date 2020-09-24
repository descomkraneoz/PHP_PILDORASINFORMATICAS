<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do - While</title>
</head>
<body>
<?php

//el bucle do-while se ejecuta al menos una vez el contenido del do

$var1=1;

do{
    echo "Estamos ejecutando el código del bucle <br>";
    $var1++;

}while($var1<6);

echo "Salimos del bucle while <br>";    

?>
    
</body>
</html>