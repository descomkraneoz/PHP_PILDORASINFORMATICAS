<style>
        .resultado{
            color:red;
            font-weight: bold;
            font-size: 32px;
        }
    </style>

<?php
        if (isset($_POST["button"])) {
            
            $numero1=$_POST["num1"];
            $numero2=$_POST["num2"];
            $operacion=$_POST["operacion"];
            //le pasamos a la función la operación, esto es un paso de parámetros
            calcular($operacion);            
        }

        function calcular($calculo){
            global $numero1;
            global $numero2;

            if (!strcmp("Suma",$calculo)){
                $resultado=$numero1+$numero2;
                echo "<p class='resultado'>El resultado de sumar $numero1 + $numero2 es: $resultado</p>";
            }
            if (!strcmp("Resta",$calculo)){
                $resultado=$numero1-$numero2;
                echo "<p class='resultado'>El resultado de restar $numero1 - $numero2 es: $resultado</p>";
            }
            if (!strcmp("Multiplicación",$calculo)){
                $resultado=$numero1*$numero2;
                echo "<p class='resultado'>El resultado de multiplicar $numero1 x $numero2 es: $resultado</p>";
            }
            if (!strcmp("División",$calculo)){
                $resultado=$numero1/$numero2;
                echo "<p class='resultado'>El resultado de dividir $numero1 / $numero2 es: $resultado</p>";
            }
            if (!strcmp("Módulo",$calculo)){
                $resultado=$numero1%$numero2;
                echo "<p class='resultado'>El resultado del módulo $numero1 % $numero2 es: $resultado</p>";
            }
        }
    ?>