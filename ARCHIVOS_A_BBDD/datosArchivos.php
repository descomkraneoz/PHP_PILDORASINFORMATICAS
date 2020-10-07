<?php
    //Recibimos los datos de la imagen
    $nombre_archivo = $_FILES['archivo']['name']; //del formulario rescatamos el archivo y lo guardamos en la propiedad name del array $_FILES

    $tipo_archivo = $_FILES['archivo']['type']; //para el tipo de archivo

    $tamagno_archivo = $_FILES['archivo']['size']; //para su tamaño

    //echo $tipo_imagen . "<br>";

    if ($tamagno_archivo<=2000000) { //para que no exceda de 2MB

        //Ruta de la carpeta destino en el servidor
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/'; //establecemos la ruta de destino del archivo al subirse
    
        //Movemos el archivo del directorio temporal al directorio escogido
        move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo);

    }else{

        echo "El tamaño de archivo excede de 2MB";

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

    //uso del fopen y fread

    $archivo_objetivo=fopen($carpeta_destino . $nombre_archivo, "r"); //ruta (carpetas+nombreArchivo) mas permiso de lectura en este caso 
    
    //leemos los bytes
    $contenido=fread($archivo_objetivo, $tamagno_archivo);//archivo mas tamaño de este

    //para que php reconozca las / necesito que escape estas con la funcion addslashes
    $contenido=addslashes($contenido);

    //cerramos el archivo
    fclose($archivo_objetivo);

    //Sentencia sql 
    $sql="INSERT INTO ARCHIVOS (id, nombre, tipo, contenido) VALUES (0, '$nombre_archivo', '$tipo_archivo', '$contenido')";

    $resultado=mysqli_query($conexion, $sql);

    if (mysqli_affected_rows($conexion)>0) {
        
        echo "Se ha insertado el registro con éxito";

    }else{

        echo "Ocurrio un problema al insertar el registro";

    }


?>