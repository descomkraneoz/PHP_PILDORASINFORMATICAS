<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión pdo</title>
</head>
<body>

    <?php

    //creamos la conexión a la bd mysql    
    //$base=new PDO('mysql:dbname=prueba_php; host=127.0.0.1; port=3308', 'root', '');

    //Como se recomienda a traves del manual de php de como hacer la conexión:
    $dsn = 'mysql:dbname=prueba_php; host=127.0.0.1; port=3308';
    $usuario = 'root';
    $contraseña = '';

    try {
        $gbd = new PDO($dsn, $usuario, $contraseña);
        echo 'Conexión OK';
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    } finally {
        $gbd=null;//vacia la memoria
    }


    ?>    
</body>
</html>