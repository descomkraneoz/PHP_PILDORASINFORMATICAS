<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parametros por referencia</title>
</head>
<body>
<?php
    function incrementa(&$valor1){
        $valor1++;
        return $valor1;
    }
    $numero=5;
    echo incrementa($numero) . "<br>"; //6

    echo $numero . "<br>"; //6 altera el numero original

    echo "-------------------------------------------<br>";
    echo "<h2>Funcion cambia mayúsculas</h2>";

    function cambia_mayus(&$param){
        $param =strtolower($param); //hola mundo
        //$param=ucfirst($param); //Hola mundo
        $param=ucwords($param); //Hola Mundo
        return $param;
    }
    $cadena="hOlA mUnDo";

    echo cambia_mayus($cadena) . "<br>";

    echo $cadena;


?>
    
</body>
</html>