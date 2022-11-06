<?php 
    $id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 2){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>

<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            Los prestamos tienen una comision del 5% mensual
            <form action="amort.php" method="POST">
                <label>¿Cuanto dinero desea? </label>
                <input type="number" name="dinero"><br>
                <label>¿En cuantos meses desea pagar?</label>
                <input type="number" name="meses"><br>
                <label>¿Lo desea en efectivo o depositado a su cuenta?</label>
                <select name="metodo">
                    <option value="0" selected disabled>Seleccione efectivo o transferencia</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Transferencia</option>
                </select><br>
                <label>Escriba su contraseña</label>
                <input type="password" name="pass"><br>
                <input type="hidden" name="destino" value="<?=$id?>">

                <div class="mt-3">
                    <div class="h-captcha" data-sitekey="d86ad688-fbcc-45d7-8cb4-ec8e394cdd80"></div>
                </div>

                <input type="submit" value="Calcular tabla de amortizacion">
            </form>
        </div>
    </div>
</body>
</html>
