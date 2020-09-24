<?php

    require_once("MODELO/productos_modelo.php");

    $producto=new productos_modelo(); //instanciamos la clase para hacer la llamada al constructor

    $matrizProductos=$producto->getProductos();

    require_once("VISTA/productos_view.php");



?>