<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leer cookie 1</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["prueba"])){

            echo $_COOKIE["prueba"] . "<br>";

        }else{
            echo "La cookie 1 no se ha creado";
        }
        
    ?>
</body>
</html>