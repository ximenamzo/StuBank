<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach($clientes as $cliente):
        $saldo = $cliente['saldo'];
        $deuda = $cliente['deuda'];
    endforeach;
    //sacar los datos del historial transferencia
    $consulta = "SELECT * FROM transacciones WHERE cTramitador='$cuenta' ORDER BY fecha DESC LIMIT 2";
    $resultado = mysqli_query($mysqli,$consulta);
    $datos = $resultado->fetch_all(MYSQLI_ASSOC);
    //Depositos
    $consulta2 = "SELECT * FROM transacciones WHERE cDestino='$cuenta' ORDER BY fecha DESC LIMIT 2";
    $resultado2 = mysqli_query($mysqli,$consulta2);
    $datos2 = $resultado2->fetch_all(MYSQLI_ASSOC);
    //Retiros
    $consulta3 = "SELECT * FROM transacciones WHERE cOrigen='$cuenta' ORDER BY fecha DESC LIMIT 2";
    $resultado3 = mysqli_query($mysqli,$consulta3);
    $datos3 = $resultado3->fetch_all(MYSQLI_ASSOC);

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
        <?php include('menu.php');?>
        <div class="col-md-4">
            <div class="tit">
                <p>Saldo de la cuenta:</p>
            </div>
            <div class="cont-purp">
                $<?=$saldo?><br>
            </div><br>
            <div class="tit">
                <p>Deuda actual:</p>
            </div>
            <div class="cont-purp">
                $<?=$deuda?><br>
            </div><br>
        </div>
        <div class="col-md-4"> 
            <div class="tit">
                <p>Tu actividad:</p>
            </div>
            <div class="cont-purp2">
                <u class="histoContainer">
                <?php foreach($datos as $dato): ?>
                    <li class="columnasC">
                        <div class="histo-img">
                            <img src="/src/transferencia.png">
                        </div>
                        <div class="clases">
                            <p><?=$dato['tipo']?> a</p>
                            <p><?=$dato['cDestino']?></p>
                        </div>
                        <div class="clases2">
                            <p>- $<?=$dato['cantidad']?></p>
                            <p><?=$dato['fecha']?></p>
                        </div>
                    </li>
                <?php endforeach ?>
                <?php foreach($datos2 as $dato2): ?>
                    <li class="columnasC">
                        <div class="histo-img">
                            <img src="/src/deposito.png">
                        </div>
                        <div class="clases">
                            <p><?=$dato2['tipo']?></p>
                            <p></p>
                        </div>
                        <div class="clases2">
                            <p>+ $<?=$dato2['cantidad']?></p>
                            <p><?=$dato2['fecha']?></p>
                        </div>
                    </li>
                <?php endforeach ?>
                <?php foreach($datos3 as $dato3): ?>
                    <li class="columnasC">
                        <div class="histo-img">
                            <img src="/src/retiro.png">
                        </div>
                        <div class="clases">
                            <p><?=$dato3['tipo']?></p>
                            <p></p>
                        </div>
                        <div class="clases2">
                            <p>- $<?=$dato3['cantidad']?></p>
                            <p><?=$dato3['fecha']?></p>
                        </div>
                    </li>
                <?php endforeach ?>
                    <li class="columnasC2">
                        <a class="histBtn"href="/cliente/movimientos.php">Ver mas</a>
                    </li>
                </u>
            </div>  
        </div>
    </div>
</body>
</html>
