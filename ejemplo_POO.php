<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO primeros pasos</title>
</head>
<body>

<?php
    //clase coche
    class Coche{
        //propiedades
        var $ruedas;
        var $color;
        var $motor;
        //constructor
        function Coche(){
            $this->ruedas =4;
            $this->color ="";
            $this->motor =1600;
        }
        //funcionalidades
        function arrancar(){
            echo "Estoy arrancando <br>";
        }
        function girar(){
            echo "Estoy girando <br>";
        }
        function frenar(){
            echo "Estoy frenando <br>";
        }
        function estableceColor($color_coche, $nombre_coche){
            $this->color=$color_coche;
            echo "El color de " . $nombre_coche . " es: ". $this->color . "</br>";
        }

    }
    //objetos o instancias de clase coche
    $renault=new Coche();
    $fiat=new Coche();
    $peugeot=new Coche();

    $peugeot->girar();
    echo $peugeot->ruedas . "</br>";
    $peugeot->estableceColor("Rojo","Peugeot");
    $fiat->estableceColor("Azul","Fiat");


?>
    
</body>
</html>