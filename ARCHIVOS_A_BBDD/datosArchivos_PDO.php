<?php

//Recibimos los datos de el archivo,recordemos que en el array asociativo viajan todas las propiedades
header('Content-Type: text/html; charset=UTF-8');

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamagno_archivo = $_FILES['archivo']['size'];

echo "Nombre: " . $nombre_archivo . "<br>Tamaño: " . round($tamagno_archivo / 1024, 2) . " KB<br>Tipo: " . $tipo_archivo;


//podemos decir que sean 10MB,por ejemplo.
if ($tamagno_archivo < (pow(10, 6) * 10)) {

    //Fijamos la carpeta destino en servidor para las imagenes
    //La vamos a almacenar en una variable por motivos obvios
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';

    //Movemos el archivo del directorio temporal al directorio escogido en el servidor.Sintaxis move_uploaded_file (archivo, destino)

    move_uploaded_file(
        $_FILES['archivo']['tmp_name'],
        $carpeta_destino . $nombre_archivo
    );

    echo "<br>" . "Archivo subido con éxito!";
} else {

    //Vamos a poner algo para que lo sepa el usuario,lógicamente
    echo "<br>" . "Se ha superado el tamaño permitido(2048KB)." . " Su archivo tiene un tamaño de " . round($tamagno_archivo / 1024, 2) . " KB" . "<br>" . "
    En MB son " . round($tamagno_archivo / pow(10, 6), 2)  . " MB. No se subirá el archivo.Seleccione un archivo de menos de 2MB";
}

//debemos crear una conexion
try {
    $conexion = new PDO("mysql:host=localhost:3308; dbname=prueba_php", "root", "");
    //los warnings
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    //el charset
    $conexion->exec("SET CHARACTER SET utf8");

    //Antes de realizar la SQL debemos usar las funciones fopen y fread
    //Ademas la instruccion será de tipo insert into
    //La ruta la tenemos al completo entre la concatenacion de estas dos variables.Con permiso de solo lectura es suficiente
    $archivo = fopen($carpeta_destino . $nombre_archivo, "r");

    //tmb valdria con $tamagno_archivo
    $archivo_en_bytes = fread($archivo, intval(filesize($carpeta_destino . $nombre_archivo)));

    $archivo_en_bytes = addslashes($archivo_en_bytes);

    //deberiamos cerrar este flujo de datos,que no entre el frío
    fclose($archivo);


    //Esta insert deberia ser anti-inyeccion
    $sql = "INSERT INTO ARCHIVOS (nombre, tipo, contenido) VALUES (:nombre, :tipo, :contenido)";

    $res = $conexion->prepare($sql);

    //la expresion arroja un boolean,asi que esta evaluada si es True
    //$b es un bool
    $b = $res->execute(array(':nombre'=>$nombre_archivo,':tipo'=> $tipo_archivo,':contenido'=>$archivo_en_bytes));

    if ($b) {
        echo "<br>" . "Se ha realizado la insercion del registro." . "<br>";
        $res->closeCursor();
    } else {
        echo "<br>" . $conexion->errorInfo();
    };
} catch (Exception $e) {
    die("Error" . $e->getLine() . " " . $e->getMessage());
}

?>