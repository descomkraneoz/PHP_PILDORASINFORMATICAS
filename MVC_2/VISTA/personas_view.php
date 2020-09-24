<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de las personas</title>

</head>
<body>

    <?php 
    
        require("MODELO/paginacion.php");
    

    ?>

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
         * en la variable matrizPersonas que contiene los datos de las personas que voy a mostrar en la tabla html que sale acontinuación.
         * Ojo que el bucle no contiene las llaves porque esta concatenando con codigo html
         * al tratarse de un array hay que llamarlo de la siguiente manera: $persona["Id"] ; si fuera un objeto $persona->Id
         */

            foreach($matrizPersonas as $persona):        

        ?>
		
        <tr>
            <td><?php echo $persona["Id"]?></td>
            <td><?php echo $persona["Nombre"]?></td>
            <td><?php echo $persona["Apellido"]?></td>
            <td><?php echo $persona["Direccion"]?></td> 
            <td class="bot"><a href="MODELO/borrar.php?Id=<?php echo $persona["Id"]?>"><input type='button' name='del' id='del' value='Borrar'></td>
            <td class='bot'><a href="MODELO/editar.php?Id=<?php echo $persona["Id"]?> & nom=<?php echo $persona["Nombre"]?> & ape=<?php echo $persona["Apellido"]?> 
            & dir=<?php echo $persona["Direccion"]?> "><input type='button' name='up' id='up' value='Actualizar'></a></td>
            
        </tr>

        <?php

            endforeach;

            /**
             * Aqui hacemnos que el bucle foreach termine 
             * */

        ?>

        <?php

        /* CÓDIGO QUE HACE FUNCIONAR EL BOTON DE INSERTAR */

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


</body>
</html>