<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de insertar pdo</title>
</head>
<body>

    <?php
    //variables que rescataran del Formulario de busqueda pdo v3 los datos introducidos por el usuario    
    $busqueda_sec=$_POST["seccion"];
    $busqueda_nart=$_POST["n_art"];
    $busqueda_fecha=$_POST["fecha"];
    $busqueda_porig=$_POST["p_orig"];
    $busqueda_precio=$_POST["precio"];

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
        $sql="insert into artículos (sección, nombre_artículo, fecha, país_de_origen, precio) values (:seccion, :n_art, :fecha, :p_orig, :precio)"; 
        //almacenamos el objeto pdo statment en una variable
        $resultado=$gbd->prepare($sql); //lo podemos consultar en : https://www.php.net/manual/es/pdostatement.execute.php        
        $resultado->execute(array(":seccion"=>$busqueda_sec, ":n_art"=>$busqueda_nart, ":fecha"=>$busqueda_fecha, ":p_orig"=>$busqueda_porig, ":precio"=>$busqueda_precio));
        
        echo "Registro insertado";
        
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