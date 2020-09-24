<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php

    include ("conexion.php");

    //$conexion=$base->query("SELECT * FROM DATOS_USUARIOS");

    //$registros=$conexion->fetchAll(PDO::FETCH_OBJ);//dentro de la variable almaceno los objetos para acceder a sus propiedades (nombre, apellido, direccion)

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

    //devolvera 3 registros por pagina según el limit que he puesto
    $registros=$base->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezar_desde,$tamagno_paginas")->fetchAll(PDO::FETCH_OBJ); 

    if(isset($_POST["cr"])){

        $nombre=$_POST["Nom"];
        $apellido=$_POST["Ape"];
        $direccion=$_POST["Dir"];

        $sql="INSERT INTO DATOS_USUARIOS (NOMBRE, APELLIDO, DIRECCION) VALUES(:nom, :ape, :dir)";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

        header("Location:index.php");

    }

?>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <table width="50%" border="0" align="center">
        <tr >
            <td class="primera_fila">Id</td>
            <td class="primera_fila">Nombre</td>
            <td class="primera_fila">Apellido</td>
            <td class="primera_fila">Dirección</td>
            <td class="sin">&nbsp;</td>
            <td class="sin">&nbsp;</td>
            <td class="sin">&nbsp;</td>
        </tr>         

        <?php

        /**
         * En este punto quiero repetir tantas filas como registros haya en la bd, por ello construyo un bucle foreach para recorrer el array almacenado 
         * en la variable registros que contiene los datos de las personas que voy a mostrar en la tabla html que sale acontinuación.
         * Ojo que el bucle no contiene las llaves porque esta concatenando con codigo html
         */

            foreach($registros as $persona):        

        ?>
		
        <tr>
            <td><?php echo $persona->Id?></td>
            <td><?php echo $persona->Nombre?></td>
            <td><?php echo $persona->Apellido?></td>
            <td><?php echo $persona->Direccion?></td> 
            <td class="bot"><a href="borrar.php?Id=<?php echo $persona->Id?>"><input type='button' name='del' id='del' value='Borrar'></td>
            <td class='bot'><a href="editar.php?Id=<?php echo $persona->Id?> & nom=<?php echo $persona->Nombre?> & ape=<?php echo $persona->Apellido?> 
            & dir=<?php echo $persona->Direccion?> "><input type='button' name='up' id='up' value='Actualizar'></a></td>
        </tr>

        <?php

            endforeach;

            /**
             * Aqui hacemnos que el bucle foreach termine
             */

        ?>
        
        <tr>
            <td></td>
            <td><input type='text' name='Nom' size='10' class='centrado'></td>
            <td><input type='text' name='Ape' size='10' class='centrado'></td>
            <td><input type='text' name=' Dir' size='10' class='centrado'></td>
            <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr> 
            <tr><td colspan='4'><?php

/* -----------------------------------------------------------------NÚMEROS PARA LA PAGINACIÓN ------------------------------------------------------------------------ */

for ($i=1; $i<=$total_paginas ; $i++) { 
    
    echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
}

?></td></tr>   
    </table>
    </form>

    

<p>&nbsp;</p>
</body>
</html>