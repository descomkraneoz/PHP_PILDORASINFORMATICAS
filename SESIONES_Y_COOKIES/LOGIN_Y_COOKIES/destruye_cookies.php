<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>destruye cookie</title>
</head>
<body>
    <?php

    //para borrar una cookie solo hay que poner un tiempo negativo
    setcookie("nombre_usuario", "juan", time()-1); //solo es para hacer pruebas con la cuenta logeada de juan

    echo "Cookie destruida"; //para informar solo a nivel de programacion

    ?>
</body>
</html>