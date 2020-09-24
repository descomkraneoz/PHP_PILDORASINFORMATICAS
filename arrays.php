<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrays</title>
</head>
<body>
<?php

    //array indexado que almacena los tres primeros dias de la semana, se puede poner o no el indice.
    $semana[]="Lunes";
    $semana[]="Martes";
    $semana[]="Miercoles";

    echo $semana[1] . "<br>"; //Martes

    //otra forma de escribir un array indexado
    $semana=array("Lunes", "Martes", "Miercoles", "Jueves");

    echo $semana[3] . "<br>"; //Jueves

    //otra forma de array con indices personalizados o asociativos
    $datos=array("Nombre"=>"Juan", "Apellido"=>"Gómez", "Edad"=>21);

    echo $datos["Apellido"] . "<br>"; 

    //comprobar si es un array o no es
    if (is_array($datos)) {
        echo "Es un array </br>";
    }else{
        echo "No es un array </br>";
    }

    //recorrer elementos de un array asociativo
    foreach ($datos as $clave=>$valor) {
        echo "A $clave le corresponde $valor <br>";
    }

    //recorrer un array indexado
    for ($i=0; $i < count($semana) ; $i++) { 
        echo $semana[$i]."<br>";
    }

    //agregar un elemento mas al array indexado
    $semana[]="Viernes";
    for ($i=0; $i < count($semana) ; $i++) { 
        echo $semana[$i]."<br>";
    }

    //agregar un elemento mas al array asociativo
    $datos["País"]="España";
    foreach ($datos as $clave=>$valor) {
        echo "A $clave le corresponde $valor <br>";
    }

    //ordenar elementos de un array alfabeticamente
    $dias=array("Lunes", "Martes", "Miercoles", "Jueves");
    sort($dias);
    for ($i=0; $i < count($dias) ; $i++) { 
        echo $dias[$i]."<br>";
    }

?>
</body>
</html>