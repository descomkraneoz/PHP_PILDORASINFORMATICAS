<?php
    //Recibimos los datos de la imagen
    $nombre_imagen = $_FILES['imagen']['name']; //del formulario rescatamos la imagen y la guardamos en la propiedad name del array $_FILES

    $tipo_imagen = $_FILES['imagen']['type']; //para el tipo de imagen

    $tamagno_imagen = $_FILES['imagen']['size']; //para su tamaño

    //echo $tipo_imagen . "<br>";

    if ($tamagno_imagen<=1000000) { //para que la imagen no exceda de 1MB

        if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/gif" || $tipo_imagen=="image/png" || $tipo_imagen=="image/bmp" || $tipo_imagen=="image/jpg") { //para asegurar que lo que se sube es una imagen y no un pdf u otra cosa

            //Ruta de la carpeta destino en el servidor
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/'; //establecemos la ruta de destino de la imagen al subirse
    
            //Movemos la imagen del directorio temporal al directorio escogido
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);

        }else{

            echo "Solo se pueden subir imagenes jpg/jpeg/png/gif/bmp";

        }

    }else{

        echo "El tamaño de archivo excede de 1MB";

    }    

    //conexion a la base de datos

    require ("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

    if (mysqli_connect_errno()) {

        echo("Fallo al conectar con la BBDD");

        exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    mysqli_set_charset($conexion, "utf8");

    $sql="UPDATE ARTÍCULOS SET FOTO ='$nombre_imagen' where  nombre_artículo='Tubos'";

    $resultado=mysqli_query($conexion, $sql);

?>