<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crea cookie</title>
</head>
<body>
    <?php
        //setcookie("idioma_seleccionado", $_GET["idioma"], time() -1);

        setcookie("idioma_seleccionado", "en", time() -1);//español

        //redirigir a ver cookie
        header("Location:ver_cookie.php");
    ?>
</body>
</html>