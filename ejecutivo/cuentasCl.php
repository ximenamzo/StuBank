<?php
	$id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM cuentas WHERE nCliente = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $cuentas = $resultado->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Débito', 'Crédito', 'Ahorro', 'Dólares', 'Débito (Secundaria)'];
    $flagCredito = 0;
    $flagAhorro = 0;
    $flagDolares = 0;
    $flagDebito2 = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
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
            <h5>Cuentas abiertas:</h5>
            <?php foreach($cuentas as $cuenta):?>
                <div class="cuenta">
                    <h4><?=$tiposCuenta[$cuenta['tipo']];?></h4>
                    <?php
                        if($cuenta['tipo'] == 2)
                            $flagCredito = 1;
                        elseif($cuenta['tipo'] == 3)
                            $flagAhorro = 1;
                        elseif($cuenta['tipo'] == 4)
                            $flagDolares = 1;
                        elseif($cuenta['tipo'] == 5)
                            $flagDebito2 = 1;
                    ?>
                </div>
            <?php endforeach;?>
                <br>
            <h5>Cuentas disponibles para apertura:</h5>
            <?php if($flagDebito2 == 0):?>
                <div class="cuenta">
                    <h3><?=$tiposCuenta[5];?></h3>
                    Guarda y maneja tu dinero en una cuenta secundaria, con los mismos privilegios de tu cuenta de débito principal.
                    <br><a href="setCuenta.php?id=<?=$id?>&tipo=5" class="btn btn-success mt-3">Abrir cuenta</a>
                </div>
            <?php endif;?>
            <?php if($flagCredito == 0):?>
                <div class="cuenta">
                    <h3><?=$tiposCuenta[2];?></h3>
                    Solicita préstamos en efectivo o directo a tu cuenta de crédito.
                    <br><a href="setCuenta.php?id=<?=$id?>&tipo=2" class="btn btn-success mt-3">Abrir cuenta</a>
                </div>
            <?php endif;?>
            <?php if($flagAhorro == 0):?>
                <div class="cuenta">
                    <h3><?=$tiposCuenta[3];?></h3>
                    Guarda tu dinero y retira hasta el 10%.
                    <br><a href="setCuenta.php?id=<?=$id?>&tipo=3" class="btn btn-success mt-3">Abrir cuenta</a>
                </div>
            <?php endif;?>
            <?php if($flagDolares == 0):?>
                <div class="cuenta">
                    <h3><?=$tiposCuenta[4];?></h3>
                    Guarda y retira tus pesos en dólares.
                    <br><a href="setCuenta.php?id=<?=$id?>&tipo=4" class="btn btn-success mt-3">Abrir cuenta</a>
                </div>
            <?php endif;?>
        </div>
    </div>
</body>
</html>