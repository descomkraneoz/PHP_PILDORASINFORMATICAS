<?php
    //clase coche
    class Coche{
        //propiedades
        protected $ruedas; //accesible desde la propia clase y de las clases que heredan
        var $color;
        protected $motor;
        //constructor
        function Coche(){
            $this->ruedas =4;
            $this->color ="";
            $this->motor =1600;
        }
        //funcionalidades
        function get_ruedas(){
            return $this->ruedas;
        }
        function get_motor(){
            return $this->motor;
        }
        function arrancar(){
            echo "Estoy arrancando <br>";
        }
        function girar(){
            echo "Estoy girando <br>";
        }
        function frenar(){
            echo "Estoy frenando <br>";
        }
        function set_color($color_coche, $nombre_coche){
            $this->color=$color_coche;
            echo "El color de " . $nombre_coche . " es: ". $this->color . "</br>";
        }

    }
    //-----------------------------------------------------------------------------------

    //clase camión
    class Camion extends Coche{
        
        //constructor
        function Camion(){
            $this->ruedas =8;
            $this->color ="gris";
            $this->motor =2600;
        }

        //sobreescribimos el metodo de establecer color_coche
        function estableceColor($color_camion, $nombre_camion){
            $this->color=$color_camion;
            echo "El color de " . $nombre_camion . " es: ". $this->color . "</br>";
        }

        //uso del parent
        function arrancar(){
            parent::arrancar(); //ejecuta el metodo de la clase padre
            echo "Camión arrancado"; //ejecuta esta linea ademas de las heredadas
        }
        

    }
?>