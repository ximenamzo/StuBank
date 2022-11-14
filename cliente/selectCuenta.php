<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM cuentas WHERE nCliente = '$cuenta' AND tipo != 2 AND tipo != 3";
    $resultado = mysqli_query($mysqli, $obtencion);
    $cuentas = $resultado->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Debito', 'Credito', 'Ahorro','Dolares', 'Debito (Secundaria)'];
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
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>

<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-8">
            <h1>Seleccione la cuenta que desea usar</h1><br>
            <?php foreach($cuentas as $cu):?>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-4 border border-dark">
                            <h4><?=$tiposCuenta[$cu['tipo']]?></h4>
                            <?php $send = $cu['cuenta']?>
                            Saldo disponible: $<?=$cu['saldo']?><br>
                        </div>
                        <div class="col-md-1 border border-dark">
                            <a href="formDest.php?cl=<?=$cu['cuenta']?>" class="btn btn-primary mt-2" type="submit"><i class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>