<?php

try {

    $base = new PDO("mysql:host=localhost:3308; dbname=prueba_php", "root", "");

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $base->exec("set character set utf8");    


} catch (Exception $e) {

    echo "La línea de error es: " . $e->getLine() . $e->getMessage();

} 

?>