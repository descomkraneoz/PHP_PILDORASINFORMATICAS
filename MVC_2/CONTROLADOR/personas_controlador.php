<?php

    require_once("MODELO/personas_modelo.php");

    $persona=new Personas_modelo(); //instanciamos la clase para hacer la llamada al constructor

    $matrizPersonas=$persona->getPersonas();

    require_once("VISTA/personas_view.php");



?>