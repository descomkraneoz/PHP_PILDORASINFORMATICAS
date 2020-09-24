<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cierre de Sesion</title>
</head>
<body>

    <?php

        session_start();

        //cerramos la sesion
        session_destroy();

        //redirigimos al logind
        header("location:login.php");

    ?>
    
</body>
</html>