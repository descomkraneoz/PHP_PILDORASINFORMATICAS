<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: auto;
            width: 450px;
            border: 2px dotted #FF0000;
        }
    </style>
</head>
<body>
    <!--enctype="multipart/form-data" para las imagenes o archivos -->
    <form action="datosArchivos_PDO.php" method="post" enctype="multipart/form-data">

        <table>
            <tr>
                <td>
                    <label for="imagen">Archivo:</label>
                </td>
                <td>
                    <input type="file" name="archivo" id="imagen" size="20">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center"><input type="submit" value="Enviar Archivo"></td>
            </tr>
        </table>



    </form>
</body>
</html>