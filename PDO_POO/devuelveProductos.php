<?php

    require "conexion.php";

    class devuelveProductos extends conexion{

        public function __construct(){ //constructor versión moderna php 7.0 en adelante
            
            parent::__construct();//llamada al constructor de la clase padre, para llamar a la conexion a la base de datos del archivo conexion.php
        
        }

        public function get_productos($dato){
            
            $sql="SELECT * FROM ARTÍCULOS WHERE PAÍS_DE_ORIGEN='" . $dato . "'";

            $sentencia=$this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion_db=null;

        }

    }


?>