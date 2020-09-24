<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de insertar usuario</title>
    <style>
    table {
        width:300px;
        margin:auto;
        background-color:#ffc;
        border:2px solid #f00;
        padding:5px;
    }

    h1{
        text-align:center;
    }
    </style>
</head>
<body>

<h1>REGÍSTRATE</h1>

    <form action="pagina_insertar_usuario.php" method="post">
    <table><tr><td>
        USUARIO:  </td><td> <input type="text" name="usu"></td></tr>
        <tr><td>PASSWORD: </td><td> <input type="text" name="contra"></td></tr>        
        <tr><td colspan="2"> <input type="submit" name="enviando" value="¡Dale!">
        </td></tr></table>
    </form>
    
</body>
</html>