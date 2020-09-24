<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios, anotaciones y variables</title>
</head>
<body>

<?php

/*Comentarios y anotaciones
---------------------------*/

print "Comentarios y anotaciones:  <br>";
print "------------------------------ <br>";


print "Comentarios de una linea // <br>"; //imprime y hace un salto de linea (<br>)
print "Anotaciones con mas de una linea /* */ <br>";
print "<br><br><br>";

/*
Comentario de varias lineas
Comentario de varias lineas
Comentario de varias lineas
*/

/*Variables
---------------------------*/

print "Variables:  <br>";
print "----------------------- <br>";

print "Para crear una variable: \$nombreVariable= 'Juan' <br>";


$nombre="Juan";
$edad=12;
print "Para imprimir una variable se escribe el nombre de esta y el resultado es =  $nombre";
print "<br>";
print "Para concatenar texto y variables se utiliza el punto seguido de un espacio = '' Texto '' . \$nombreVariable <br>";
print "El nombre del usuario es " . $nombre;
print "<br>";
print "Tambien se puede incluir dentro del texto ahorrandonos el tener que concatenar con el punto \$nombreVariable <br>";
print "El nombre del usuario es $nombre <br>";
print "Si colocamos el texto entre comillas simples lo que imprime es el literal (nombre de la variable tal cual) <br>";
print 'El nombre del usuario es $nombre';
print "<br><br>";
print "La palabra echo imprime por pantalla al igual que print <br>";
echo "El nombre es ". $nombre . " y tiene " . $edad . " años";
print "<br>";
print 'La diferencia entre print y echo es que echo puede imprimir sin concatenar de la siguiente forma: echo $nombre,$edad';
print "<br>";
echo $nombre,$edad;
print "<br>";
echo "Por tanto para imprimir por pantalla miles de lineas lo mejor es usar echo";
print "<br>";

?>

    
</body>
</html>