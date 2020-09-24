<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uso constantes</title>
</head>
<body>
<?php
    define("AUTOR", "Juan", true); //el true lo hace insensible a mayuculas y minusculas, solo usar para no cometer fallos al programar

    echo AUTOR;

    echo "<br>";

    echo "El autor es: ". AUTOR . "<br>";

    echo "La línea de esta instrucción es: ". __LINE__ . "<br>";

    echo "Estamos trabajando con este fichero: ". __FILE__ . "<br>";
?>
</body>
</html>