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

    $obtencion = "SELECT * FROM cuentas WHERE nCliente = '$cuenta'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $cuentas = $resultado->fetch_all(MYSQLI_ASSOC);

    //sacar los datos para el historial
    $consulta = "SELECT * FROM transacciones WHERE solicitante='$cuenta' OR cTramitador='$cuenta' ORDER BY fecha DESC LIMIT 5";
    $resultado = mysqli_query($mysqli,$consulta);
    $datos = $resultado->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Débito', 'Crédito', 'Ahorro', 'Dólares', 'Débito (Secundaria)'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/estilos.css">
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
        <div class="col-md-4" style="margin-left:1.5rem;">
            <div class="tit">
                <p>Cuentas en pesos:</p>
            </div>
            <?php foreach($cuentas as $cu):?>
                <div class="cont-purp mb-4">
                    <div class="row">
                        <div class="col-9">
                            <h4 style="display:inline;"><?=$cu['titulo']?> - </h4><h5 style="display:inline;"><?=$cu['cuenta']?></h5>
                            <h6>Saldo: $<?=$cu['saldo']?></h6>
                        </div>
                        <div class="col-3" style="position:relative;">
                            <a href="cuenta.php?cl=<?=$cu['cuenta']?>" class="btn btn-outline-primary btn-sm" type="submit"><i class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-4"> 
            <div class="tit">
                <p>Actividad reciente:</p>
            </div>
            <div class="cont-purp2" style="margin-bottom: 3rem; width:98%; align-items: center; align-content: center; align-self: center;">            
                <u class="histoContainer">
                    <?php foreach($datos as $dato):
                        $tipo=$dato['tipo'];
                        $date = date_create($dato['fecha']);
                        ?> 
                        <?php if($tipo == 'Transferencia'){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/transferencia.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?> a <?=$dato['cDestino']?></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                             </li>
                        <?php }?>
                        <?php if($tipo == "Deposito"){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/deposito.png">
                                </div>
                                <div class="clases">
                                    <!--<p></?=$dato['tipo']?></p>-->
                                    <p>Depósito</p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:green;">+ $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
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
                                    <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($tipo == "Prestamo"){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/prestamos.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:#8C52FF;">+ $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($tipo == ("Pago a préstamo")){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/retiro.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($tipo == ("Pago de Servicio")){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/servicios.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($tipo == ("Recarga telefónica")){?>
                            <li class="columnasC">
                                <div class="histo-img">
                                    <img src="/src/recargas.png">
                                </div>
                                <div class="clases">
                                    <p><?=$dato['tipo']?></p>
                                    <p></p>
                                </div>
                                <div class="clases2">
                                    <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                    <p class="fechaD"><?php echo date_format($date,"d M h:ia")?></p>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach ?>
                    <?php if ($datos != NULL){ ?>
                        <li class="columnasC2">
                            <h5><a class="histBtn"href="/cliente/movimientos.php">Ver más</a></h5>                            
                        </li>
                    <?php }else{?>
                        <a class="histBtn1"href="/cliente/movimientos.php">Realiza tu primer movimiento aquí</a>
                    <?php } ?>
                </u>
            </div>  
        </div>
    </div>
</body>
<footer style="margin-top:14rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>