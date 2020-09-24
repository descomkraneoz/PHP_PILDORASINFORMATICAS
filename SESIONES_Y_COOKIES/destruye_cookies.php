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
        setcookie("prueba", "Esta es la información de nuestra primera cookie", time()-1,"/curso_php/SESIONES_Y_COOKIES/ZONA_CONTENIDOS/");

    ?>
</body>
</html>