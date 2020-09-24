<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comprueba el login</title>
</head>
<body>
    <?php

        try {

            $login =htmlentities(addslashes($_POST['login']));

            $password =htmlentities(addslashes($_POST['password']));

            //introducimos una variable contador que nos permite conocer si el login esta o no en la bd
            $contador=0;

            $base= new PDO("mysql:host=localhost:3308; dbname=prueba_php", 'root', '');

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $base->exec("SET CHARACTER SET utf8");

            $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login";

            $resultado=$base->prepare($sql);

            $resultado->execute(array(":login"=>$login));

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

                //echo "Usuario: " . $registro['USUARIOS'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";

                //en este paso comparamos la contraseña introducida por el usuario con la que hay guardada en la bd, devolvera true o false si coinciden o no.
                if(password_verify($password, $registro['PASSWORD'])){ //en la bd es recomendable que el campo password tenga una longitud de 255 caracteres

                    $contador++; //incrementamos la variable contador

                }

            }

            //termina de contar los usuario buscados y hacemos lo siguiente
            if($contador>0){

                //voy a lanzar mensajes pero podria redirigir a otra pagina con header
                echo "Usuario registrado";

            }else{

                echo "Usuario no registrado";                

            }

            $resultado->closeCursor();

        }catch(Exception $e){

            die("Error: ". $e->getMessage());

        }

    ?>
</body>
</html>