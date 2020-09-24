<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de busqueda pdo version 2</title>
    <style>
    table {
        width:300px;
        margin:auto;
        background-color:#ffc;
        border:2px solid #f00;
        padding:5px;
    }
    </style>
</head>
<body>

    <form action="pagina_busqueda_pdo.php" method="get">
    <table><tr><td>
        Sección </td><td> <input type="text" name="seccion"></td></tr>
        <tr><td>País de origen</td><td> <input type="text" name="p_orig"></td></tr>
        <tr><td colspan="2"> <input type="submit" name="enviando" value="¡Dale!">
        </td></tr></table>
    </form>
    
</body>
</html>