<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de eliminar pdo</title>
</head>
<body>

    <?php
    //variables que rescataran del Formulario de busqueda pdo v3 los datos introducidos por el usuario    
    $busqueda_nart=$_POST["n_art"];
    

    //Como se recomienda a traves del manual de php de como hacer la conexión:
    $dsn = 'mysql:dbname=prueba_php; host=127.0.0.1; port=3308';
    $usuario = 'root';
    $contraseña = '';

    try {
        $gbd = new PDO($dsn, $usuario, $contraseña);        
        //linea que coje como propiedades las excepciones y errores
        $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //le especifico que el juego de caracteres sera el utf-8
        $gbd->exec("SET CHARACTER SET utf8");
        //generamos la consulta sql, este paso se llama preparar consulta o de consultas preparadas        
        $sql="delete from artículos where nombre_artículo=:n_art"; 
        //almacenamos el objeto pdo statment en una variable
        $resultado=$gbd->prepare($sql); //lo podemos consultar en : https://www.php.net/manual/es/pdostatement.execute.php        
        $resultado->execute(array(":n_art"=>$busqueda_nart));
        
        echo "Registro eliminado";
        
        //cerramos el cursor que recorre linea a linea la tabla, para no consumir recursos innecesarios
        $resultado->closeCursor();

    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    } finally {
        $gbd=null;//vacia la memoria
    }


    ?>    
</body>
</html>