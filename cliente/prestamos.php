<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="solicitar_prestamo.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nombreCliente" class="form-control" placeholder="Ingrese su nombre" maxlength="30" required>
            <input type="text" name="cantidad" class="form-control" placeholder="Ingrese la cantidad " maxlength="30" required>
            <input type="text" name="meses" class="form-control" placeholder="Ingrese los meses" maxlength="30" required>
            <input type="submit" name="solicitar_prestamo" value="Solicitar">
        </div>
</body>
</html>