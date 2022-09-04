<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Stubank</title>
</head>
<body>
    <form action="../admin/com_deposit.php" method="post">
    <ul>
    <li>
        <label for="cuenta">Numero de cuenta</label>
        <input type="text" id="nm_cuenta" name="nm_cuenta" required>
    </li>
    <li>
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" required>
    </li>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" class="form-control" required>
    <li>
			<input type="submit" value="Solicitar" name="solicitar_Deposito">

    </li>
    </ul>
    </form>  
</body>
</html>