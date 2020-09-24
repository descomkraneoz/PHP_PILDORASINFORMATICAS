<?php

    require "conexion.php";

    class devuelveProductos extends conexion{

        public function __construct(){ //constructor versión moderna php 7.0 en adelante
            
            parent::__construct();//llamada al constructor de la clase padre, para llamar a la conexion a la base de datos del archivo conexion.php
        
        }

        public function get_productos($dato){

            /*$consulta="select * from artículos";

            //$resultado= mysqli_query($this->mysqli, $consulta);

            $productos = mysqli_fetch_all($resultado,MYSQLI_ASSOC); // MYSQLI_ASSOC [Sirve para guardar el nombre de las columnas]
            //Importante poner MYSQLI_ASSOC en el paso anterior sino deseas tratar el array con índices en vez de con nombres (para el caso foreach) */

            $resultado=$this->conexion_db->query('SELECT * FROM ARTÍCULOS WHERE PAÍS_DE_ORIGEN="' . $dato . '"');

            $productos=$resultado->fetch_all(MYSQLI_ASSOC);

            return $resultado;

        }

    }


?>