<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones predefinidas</title>
</head>
<body>
<?php
    function frase_mayus($frase, $conversion=true) {
        $frase=strtolower($frase);
        if ($conversion==true) {
            $resultado=ucwords($frase);
        }else {
            $resultado=strtoupper($frase);
        }
        return $resultado;
    }

    echo (frase_mayus("esto es una prueba", false));
?>
    
</body>
</html>