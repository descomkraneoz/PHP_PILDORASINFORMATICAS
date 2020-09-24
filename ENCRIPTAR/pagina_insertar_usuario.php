<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina insertar usuario</title>
</head>
<body>
    <?php

        $usuario =$_POST["usu"];
        $contrasenia=$_POST["contra"];

        //valores por defecto que generan una contraseña cifrada, con un coste fijo, en este caso de valor $10
        //$pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT);

        $pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12)); //incrementamos el coste a 12 del password_hash

        try{

            $base =new PDO("mysql:host=localhost:3308; dbname=prueba_php", 'root', '');

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $base->exec("SET CHARACTER SET utf8");

            $sql="INSERT INTO USUARIOS_PASS (USUARIOS, PASSWORD) VALUES (:usu, :contra)";

            $resultado=$base->prepare($sql);

            $resultado->execute(array(":usu"=>$usuario, ":contra"=>$pass_cifrado));

            echo "Registro insertado";

            $resultado->closeCursor();

        }catch (PDOException $e) {

            echo 'Falló la conexión: ' . $e->getMessage();

        }finally {

            $base=null;

        }

    ?>
</body>
</html>