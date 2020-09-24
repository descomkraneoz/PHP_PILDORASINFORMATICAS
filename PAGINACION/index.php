<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php

    try{

        $base=new PDO("mysql:host=localhost:3308; dbname=prueba_php", 'root', '');

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $base->exec("SET CHARACTER SET utf8");

        //añadimos a la sentencia sql el limit (Primer registro a mostrar, cantidad de registros a mostrar x pagina)
        //$sql_total="SELECT * FROM ARTÍCULOS WHERE SECCIÓN='DEPORTE' LIMIT 0,3";

        $tamagno_paginas=3;//cantidad de registros a mostrar x pagina


        //el siguiente bloque es para recargar la pagina y hacer que los numeros de la paginación funcionen
        if(isset($_GET["pagina"])){

            if($_GET["pagina"]==1){

                header("Location:index.php");

            }else{

                $pagina=$_GET["pagina"];

            }

        }else{

            $pagina=1;//pagina que estamos al cargar por primera vez la pagina

        }     

        $empezar_desde=($pagina-1)*$tamagno_paginas; //variable para indicar donde empezamos a mostrar la pagina de registros 

        /* ---------------------------CALCULOS PARA SABER CUANTOS DATOS VOY A MOSTRAR POR PAGINA, NUMERO DE PAGINAS, ETC -------------------------------------------- */

        $sql_total="SELECT * FROM ARTÍCULOS WHERE SECCIÓN='DEPORTE'";/*esta instruccion sql solo me vale para saber la cantidad total de registros que tengo, 
        pero a la hora de mostrar necesitare el limit, por eso esta consulta solo es valida para realizar los calculos de los echo.*/

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowcount();//para saber los registros totales

        $total_paginas=ceil($num_filas/$tamagno_paginas); //para saber cuantas paginas voy a tener en total, ceil() redondea el resultado

        echo "Numero de registros de la consulta: " . $num_filas . "<br>";
        echo "Mostramos " . $tamagno_paginas . " registros por página <br>";
        echo "Mostrando la página ". $pagina . " de " . $total_paginas . "<br><br>";
        
        $resultado->closeCursor();

        /* ---------------------------FIN DE CALCULOS PARA SABER CUANTOS DATOS VOY A MOSTRAR POR PAGINA, NUMERO DE PAGINAS, ETC ---------------------------------------- */


        /* ----------------------------------------------------------DATOS A MOSTRAR ----------------------------------------------------------------------------------- */
        $sql_limite="SELECT * FROM ARTÍCULOS WHERE SECCIÓN='DEPORTE' LIMIT $empezar_desde,$tamagno_paginas";

        $resultado=$base->prepare($sql_limite);

        $resultado->execute(array());

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

            echo "Nombre Artículo: " . $registro["NOMBRE_ARTÍCULO"] . " Sección: " . $registro["SECCIÓN"] . " Precio: ". $registro["PRECIO"] . 
            " País de Origen: " . $registro["PAÍS_DE_ORIGEN"] . " Fecha: " . $registro["FECHA"] . " <br><br>";
        
        }

    }catch(Exception $e){

            echo "Linea de error " . $e->getLine() . $e->getMessage();

        }

        /* --------------------------------------------------------FIN DE DATOS A MOSTRAR -------------------------------------------------------------------------------- */

        /* ----------------------------------------------------------------------PAGINACIÓN------------------------------------------------------------------------------- */

        for ($i=1; $i<=$total_paginas ; $i++) { 
            
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
        }

    ?>
</body>
</html>