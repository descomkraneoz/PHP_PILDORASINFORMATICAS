<?php

require_once("conectar.php");

$base=conectar::conexion();

/* ------------------------------------------------------------------------ PAGINACIÓN --------------------------------------------------------------------*/

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

$sql_total="SELECT * FROM DATOS_USUARIOS";/*esta instruccion sql solo me vale para saber la cantidad total de registros que tengo, 
pero a la hora de mostrar necesitare el limit, por eso esta consulta solo es valida para realizar los calculos de los echo.*/

$resultado=$base->prepare($sql_total);

$resultado->execute(array());

$num_filas=$resultado->rowcount();//para saber los registros totales

$total_paginas=ceil($num_filas/$tamagno_paginas); //para saber cuantas paginas voy a tener en total, ceil() redondea el resultado


/* ----------------------------------------------------------------------- FIN DE PAGINACIÓN ------------------------------------------------------------- */

?>