<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leer archivo de la BBDD</title>
</head>
<body>
    <?php

    $id="";
    $contenido="";
    $tipo="";

    require("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

    if (mysqli_connect_errno()) {

        echo("Fallo al conectar con la BBDD");

        exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    mysqli_set_charset($conexion, "utf8");

    $consulta="SELECT * FROM ARCHIVOS WHERE id='12'"; //estamos metiendo el id manualmente

    $resultado=mysqli_query($conexion, $consulta);

    while ($fila=mysqli_fetch_array($resultado)) {

        $id=$fila['id'];
        $contenido=$fila['contenido'];
        $tipo=$fila['tipo'];
    }

    echo "ID: " . $id . "<br>";
    echo "Tipo: " . $tipo . "<br>";
    //echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'>";

    if($tipo == 'image/jpeg' || $tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/gif'){
        echo "<br>";
        echo "Mostrando imagen: <br>" . "<img src='data:$tipo; base64," . base64_encode($contenido) . "'>";
        
    }else if ($tipo == 'text/plain' || $tipo == 'application/pdf'){
        echo "<br>Mostrando texto o pdf.<br>";
    ?> <!-- Cerramos temporalmente php-->

    <object data="data:<?php echo $tipo ?>;base64,<?php echo base64_encode($contenido) ?>" type="<?php echo $tipo ?>" style="height:600px;width:60%"></object>

    <?php // volvemos a abrir php para cerrar el if

    }else{ 
        
        echo "Formato no reconocido";

    } // end if elif else
    

    ?>

    
</body>
</html>