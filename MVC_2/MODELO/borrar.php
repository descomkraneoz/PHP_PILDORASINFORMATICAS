<?php

    require_once("conectar.php");

    $base=conectar::conexion();

    $Id=$_GET["Id"];

    $base->query("DELETE FROM DATOS_USUARIOS WHERE ID='$Id'");

    header("Location:../index.php");

?>