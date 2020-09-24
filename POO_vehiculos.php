<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
</head>
<body>

<?php

    include("vehiculos.php");

    $mazda = new Coche();

    $pegaso = new Camion();

    echo "El Mazda tiene ". $mazda->get_ruedas() . " ruedas <br>";

    echo "El Pegaso tiene ". $pegaso->get_ruedas() . " ruedas <br>";

    echo "El Mazda tiene ". $mazda->get_motor() . " cc de motor <br>";


    //$pegaso->estableceColor("Amarillo", "Pegaso");

    //$pegaso->arrancar();


?>
    
</body>
</html>