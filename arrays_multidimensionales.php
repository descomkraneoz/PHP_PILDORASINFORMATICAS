<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrays multidimensionales</title>
</head>
<body>
<?php

    $alimentos = array("fruta"=>array("tropical"=>"kiwi",
                                    "cítrico"=>"mandarina",
                                    "otros"=>"manzana"),

                     "leche"=>array("animal"=>"vaca",
                                    "vegetal"=>"coco"),

                     "carne"=>array("vacuno"=>"lomo",
                                    "porcino"=>"pata"));

    //echo $alimentos["carne"]["vacuno"];//lomo

    //recorrer el array de dos dimensiones
    
    /*foreach($alimentos as $clave_alim=>$alim){
        echo "$clave_alim: <br>";
        //desdoblamos el segundo array segun su clave valor  
        while(list($clave,$valor) = each($alim)){
            echo "$clave=$valor <br>";
        }
        echo "<br>";
    }*/

    echo var_dump($alimentos);


?>
</body>
</html>