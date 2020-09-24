<?php

    class Productos_modelo{

        private $db; //almacenare la conexión

        private $productos; //almacenare los productos de

        //constructor de la clase
        public function __construct(){

            require_once("MODELO/conectar.php");//cargamos el archivo con la ruta

            $this->db =conectar::conexion(); //hacemos la conexion 

            $this->productos=array(); //creamos un array de productos 

        }

        public function getProductos(){

            $consulta=$this->db->query("SELECT * FROM ARTÍCULOS");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

                $this->productos[]=$filas; //pasamos el contenido de un array a otro 

            }

            return $this->productos;

        }

    }

?>