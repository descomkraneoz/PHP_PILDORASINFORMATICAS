<?php

    class Conectar{

        public static function conexion(){

            try {

                $conexion=new PDO("mysql:host=localhost:3308; dbname=prueba_php", 'root', '');

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //atributos

                $conexion->exec("SET CHARACTER SET utf8");

            }catch(Exception $e){

                die("Error" . $e->getMessage());

                echo "Línea del error" . $e->getLine() . "\n";

            }

            return $conexion;

        }
    }

?>