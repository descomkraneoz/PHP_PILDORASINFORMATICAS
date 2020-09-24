<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        h1, h2{
            text-align: center;
        }
        table{
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin:auto;
        }
        .izq{
            text-align: right;
        }
        .der{
            text-align: left;            
        }
        td{
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php

if(isset($_POST["enviar"])){

try {

    $base=new PDO("mysql:host=localhost:3308; dbname=prueba_php", "root", "");

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";

    $resultado=$base->prepare($sql);

    //htmlentities -> convierte cualquier simbolo, por ejemplo una comilla o un guion bajo, en lenguaje html
    //addslashes -> escapar cualquier caracter extraño para evitar inyeccion sql
    $login=htmlentities(addslashes($_POST["login"]));

    $password=htmlentities(addslashes($_POST["password"]));

    //en este paso establecemos las equivalencias de lo que hay almacenado en la variable por el usuario con lo guardado en la bd
    $resultado->bindValue(":login", $login);

    $resultado->bindValue(":password", $password);

    //ejecutamos la instrucción sql 
    $resultado->execute();

    /*para saber si el usuario esta dentro o no de la base de datos, con el rowCount devolvemos el numero de registros de la bd, si el usuario
    existe en la bd devolvera un 1, si no devuelve un 0 */
    $numero_registro=$resultado->rowCount();

    if($numero_registro!=0){

        //echo "<h2>Adelante crack</h2>";

        //creamos la sesion
        session_start();
        
        //almacenamos en la variable super global $_SESSION el login de la sesion, lo que implica poder usarlo en más de una página
        $_SESSION["usuario"]=$_POST["login"];

        

    }else{

        echo "Usuario o Contraseña incorrectos";

    }


}catch (Exception $e) {
    die('Error: '. $e->getMessage());
}

}

?>

    <?php

        if(!isset($_SESSION["usuario"])){

            include("formulario.html");

        }else{

            echo "Usuario: " . $_SESSION["usuario"];

        }

    ?>

    <h2>CONTENIDO DE LA WEB</h2>
    <table width="800" border="0">
    <tr>
    <td><img src="imagenes/1.jpg" width="300" height="166"></td>
    <td><img src="imagenes/2.jpg" width="300" height="166"></td>
    </tr>
    <tr>
    <td><img src="imagenes/3.jpg" width="300" height="166"></td>
    <td><img src="imagenes/4.jpg" width="300" height="166"></td>
    </tr>
    </table>
    
</body>
</html>