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

//variable booleana que sirve para saber si el usuario se ha logeado con exito o no
$autentificado=false;

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

    //con estos pasos se si el usuario se logea con exito, si lo hace entra dentro de los if
    if($numero_registro!=0){    

        $autentificado=true;//el usuario se ha logeado con exito cambio mi booleana a true

        //ahora debo saber si activo la casilla de recordar, suponiendo que activo la casilla entra al if 
        if(isset($_POST['recordar'])){

            //creamos la cookie
            setcookie("nombre_usuario", $_POST["login"], time()+86400);

        }

    }else{

        echo "Usuario o Contraseña incorrectos";

    }


}catch (Exception $e) {
    die('Error: '. $e->getMessage());
}

}

?>

    <?php

        /* Si es la primera vez que se entra a la pagina, obviamente no estas logeado y debo mostrar el formulario y crear la cookie,
        Ahora en el caso de logearse exitosamente pero no marcar el checkbox de crear la cookie recordando sus datos, entonces no entraria al primer if, el
        ultimo caso es que se logea y marca el checkbox de recordar usuario, entonces no entra al primer if y crea la cookie, al volver a entrar dias despues, entrara
        al segundo if y no mostrara el formulario recordando asi al usuario*/
        if($autentificado==false){

            if(!isset($_COOKIE['nombre_usuario'])){

                include("formulario.html");

            }

        }

        //saludo personalizado
        if(isset($_COOKIE['nombre_usuario'])){

            echo "¡Hola " . $_COOKIE['nombre_usuario'] . "!";

        }else if($autentificado==true){

            echo "¡Hola " . $_POST['login'] . "!";

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

    <?php

        if ($autentificado==true || isset($_COOKIE["nombre_usuario"])){

            include("zona_registrados.html");
        }

    ?>
    
</body>
</html>