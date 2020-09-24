<?php

    class Personas_modelo{

        private $db; //almacenare la conexión

        private $personas; //almacenare los productos de

        //constructor de la clase
        public function __construct(){

            require_once("MODELO/conectar.php");//cargamos el archivo con la ruta

            $this->db =conectar::conexion(); //hacemos la conexion 

            $this->personas=array(); //creamos un array de productos 

        }

        public function getPersonas(){

            require("paginacion.php");

            $consulta=$this->db->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezar_desde, $tamagno_paginas");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

                $this->personas[]=$filas; //pasamos el contenido de un array a otro 

            }

            return $this->personas;

        }

    }

?>