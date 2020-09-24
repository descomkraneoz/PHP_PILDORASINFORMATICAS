<?php

require "config.php";

class Conexion{

    protected $conexion_db;

    public function __construct(){ //constructor con la libreria PDO

        try {

            $this->conexion_db = new PDO("mysql:host=localhost:3308; dbname=prueba_php", "root", "");

            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conexion_db->exec("set character set utf8");

            return $this->conexion_db;


        } catch (Exception $e) {

            echo "La línea de error es: " . $e->getLine() . $e->getMessage();

        } 
        
    }

}

?>