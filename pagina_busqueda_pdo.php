<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de busqueda pdo</title>
</head>
<body>

    <?php
    //variable que rescatara del Formulario de busqueda pdo los datos introducidos por el usuario
    //$busqueda=$_GET["buscar"]; //es del primer formulario
    $busqueda_sec=$_GET["seccion"];//es del segundo formulario
    $busqueda_porig=$_GET["p_orig"];//es del segundo formulario

    //Como se recomienda a traves del manual de php de como hacer la conexión:
    $dsn = 'mysql:dbname=prueba_php; host=127.0.0.1; port=3308';
    $usuario = 'root';
    $contraseña = '';

    try {
        $gbd = new PDO($dsn, $usuario, $contraseña);
        //echo 'Conexión OK'; //mensaje de comprobación de que la conexión es exitosa
        //linea que coje como propiedades las excepciones y errores
        $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //le especifico que el juego de caracteres sera el utf-8
        $gbd->exec("SET CHARACTER SET utf8");
        //generamos la consulta sql, este paso se llama preparar consulta o de consultas preparadas
        //$sql="Select nombre_artículo, sección, precio, fecha, país_de_origen from artículos where nombre_artículo= :n_art"; //n_art el nombre que puse al marcador //pertenece al primer formulario
        $sql="Select nombre_artículo, sección, precio, fecha, país_de_origen from artículos where sección = :secc and país_de_origen= :porig"; //segundo formulario
        //almacenamos el objeto pdo statment en una variable
        $resultado=$gbd->prepare($sql); //lo podemos consultar en : https://www.php.net/manual/es/pdostatement.execute.php
        //$resultado->execute(array("n_art"=>$busqueda)); //aqui le digo que me busque el contenido de busqueda almacenado en el marcador que cree antes, perteneciente al primer formulario
        $resultado->execute(array(":secc"=>$busqueda_sec, ":porig"=>$busqueda_porig));//uso de un array asociativo
        //recorremos en un bucle while para mostrar todas las filas
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            echo "Nombre Artículo: " . $registro['nombre_artículo'] . " Sección: " . $registro['sección'] . " Precio: " . $registro['precio'] . " Fecha: " . $registro['fecha']
            . " País de Origen: " . $registro['país_de_origen'] . "<br>";
        }
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