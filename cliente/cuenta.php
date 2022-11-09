<?php 
    session_start();
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];
    if($rol != 3){
        header("Location: ../index.php");
    }
    include('../view/conexion.php');
    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
    foreach($clientes as $cliente):
        $saldo = $cliente['saldo'];
        $deuda = $cliente['deuda'];
    endforeach;
    //sacar los datos para el historial
    $consulta = "SELECT * FROM transacciones WHERE solicitante='$cuenta' ORDER BY fecha DESC LIMIT 6";
    $resultado = mysqli_query($mysqli,$consulta);
    $datos = $resultado->fetch_all(MYSQLI_ASSOC);
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
            <?php if($deuda>0){ ?>
                <div class="tit">
                    <p>Deuda actual:</p>
                </div>
                <div class="cont-purp">$<?=$deuda?><br>
                </div><br>
            <?php } ?>
        </div>
        <div class="col-md-4"> 
            <div class="tit">
                <p>Tu actividad:</p>
            </div>
            <div class="cont-purp2">
                <u class="histoContainer">
                    <?php foreach($datos as $dato):
                        $tipo=$dato['tipo'];?> 
                        <?php if($tipo == 'Transferencia'){?>
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
                        <?php }?>
                        <?php if($tipo == "Deposito"){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/deposito.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p>+ $<?=$dato['cantidad']?></p>
                                    <p><?=$dato['fecha']?></p>
                                </div>
                            </li>
                        <?php }?>
                        <?php if($tipo == "Retiro"){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/retiro.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p>- $<?=$dato['cantidad']?></p>
                                    <p><?=$dato['fecha']?></p>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach ?>
                    <?php if ($datos != NULL){ ?>
                        <li class="columnasC2">
                            <a class="histBtn"href="/cliente/movimientos.php">Ver mas</a>
                        </li>
                    <?php }else{?>
                        <a class="histBtn1"href="/cliente/movimientos.php">Realiza tu primer movimiento aquí</a>
                    <?php } ?>
                </u>
            </div>  
        </div>
    </div>
</body>
</html>