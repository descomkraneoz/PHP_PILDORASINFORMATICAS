<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie</title>
</head>
<body>
    <?php
        //nombre de cookie, informacion de cookie, tiempo de duracion de cookie en seg, ruta del directorio de actuación de la cookie
        //https://www.php.net/manual/es/function.setcookie.php
        setcookie("prueba", "Esta es la información de nuestra primera cookie", time()+30,"/curso_php/SESIONES_Y_COOKIES/ZONA_CONTENIDOS/");

    ?>
</body>
</html>