<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flujo de ejecucion</title>
</head>
<body>
<?php

//estructuras que rompen el flujo de ejecucion del programa, condicionales, bucles y funciones

//funciones:



    echo "Este es el primer mensaje <br>";


    include ("proporciona_datos.php"); //de esta forma podemos incluir archivos externos en php, por ejemplo una función contenida en el archivo llamado.

    dameDatos();//funcion del archivo proporciona_datos.php

    echo "Este es el segundo mensaje <br>";

?> 
</body>
</html>