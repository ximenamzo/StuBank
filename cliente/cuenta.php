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

    $cl = $_REQUEST['cl'];

    //Para cuenta
    $obtC = "SELECT * FROM cuentas WHERE cuenta = '$cl' LIMIT 1";
    $resC = $mysqli->query($obtC);
    $cue = $resC->fetch_all(MYSQLI_ASSOC);
    foreach ($cue as $cu) {
        //printf("%s (%s)\n", $cu["titulo"], $cu["cuenta"]);
    }
    //var_dump ($cue);

    $nCuenta = $cu["cuenta"];
    $titulo = $cu["titulo"];
    $saldo = $cu["saldo"];
    $tipo = $cu["tipo"];

    //Para deuda
    if($tipo == 'B'){
        $obtD = "SELECT * FROM prestamos WHERE solicitanteCl = '$cl' and estatus = 2 LIMIT 1";
        $resD = $mysqli->query($obtD);
        $deu = $resD->fetch_all(MYSQLI_ASSOC);
        foreach ($deu as $de) {
            //printf("%s (%s)\n", $cu["titulo"], $cu["cuenta"]);
        }
        $deuda = $de["deuda"];
    }

    //Para historial
    $obtH = "SELECT * FROM transacciones WHERE cOrigen = '$cl' OR cDestino = '$cl' ORDER BY fecha DESC LIMIT 5";
    $resultado = mysqli_query($mysqli,$obtH);
    $datos = $resultado->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Débito', 'Crédito', 'Ahorro', 'Dólares', 'Débito (Secundaria)'];
    $otro = $tiposCuenta[5];
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
        <div class="col-md-4" style="padding:0 1.5rem;">
            <div class="tit2">
                <p style="display:inline;">Cuenta <?=$titulo;?></p><p style="display:inline; font-style: italic; font-weight: bold;"> &#9679 <?=$nCuenta;?></p>
            </div>
            <div class="contBotones">
                <div class="tarjeta">
                <p class="saldoCN">$<?=$saldo?></p>
                <p class="saldoC">Saldo disponible</p>
                <img src="../src/chip.png" class="chip" alt="">
                </div>
            </div>
            <?php if($titulo == "Débito"){?>
                <div class="contBotones">
                    <a href="formDest.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Transferir a cuenta &nbsp;&nbsp;<i class="bi bi-arrow-left-right"></i></a><br><br>
                    <a href="formPagos.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Pagar servicio &nbsp;&nbsp;<i class="bi bi-receipt"></i></a><br><br>
                    <a href="formRecarga.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Recargas y Paquetes &nbsp;&nbsp;<i class="bi bi-phone"></i></a><br><br>
                </div>
            <?php }?>
            <?php if($titulo == "Crédito"){?>
                <div class="contBotones">
                    <?php if($deuda != 0):?>
                        Esta cuenta tiene una deuda acutal de $<?=$deuda?>, para abonar dirígete al apartado de <a href="prestamos.php">préstamos</a>.
                    <?php endif?>
                </div>
            <?php }?>
            <?php if($titulo == "Ahorro"){?>
                <div class="contBotones">
                    Recuerda que puedes retirar el 10% de esta cuenta desde cualquier banco físico de StuBank.
                </div>
            <?php }?>
            <?php if($titulo == "Dólares"){?>
                <div class="contBotones">
                    <a href="formDest.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Transferir a cuenta &nbsp;&nbsp;<i class="bi bi-arrow-left-right"></i></a><br><br>
                </div>
            <?php }?>
            <?php if($titulo == ("Débito (secundaria)")){?>
                <div class="contBotones">
                    <a href="formDest.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Transferir a cuenta &nbsp;&nbsp;<i class="bi bi-arrow-left-right"></i></a><br><br>
                    <a href="formPagos.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Pagar servicio &nbsp;&nbsp;<i class="bi bi-receipt"></i></a><br><br>
                    <a href="formRecarga.php?cl=<?=$cu['cuenta']?>" class="btn-custom" style="background-color:#8c52ff; margin-bottom:1rem;">Recargas y Paquetes &nbsp;&nbsp;<i class="bi bi-phone"></i></a><br><br>
                </div>
            <?php }?>
        </div>



        <div class="col-md-4"> 
            <div class="tit">
                <p>Actividad reciente:</p>
            </div>
            <div class="cont-purp2" style="margin-bottom: 3rem; width:98%; align-items: center; align-content: center; align-self: center;">            
                <u class="histoContainer">
                    <?php foreach($datos as $dato):
                        $tipo=$dato['tipo'];?> 
                        <?php if($tipo == 'Transferencia'){?>
                            <?php if($nCuenta == $dato['cOrigen']){?>
                                <li class="columnasC">
                                    <div class="histo-img">
                                        <img src="/src/transferencia.png">
                                    </div>
                                    <div class="clases">
                                        <p><?=$dato['tipo']?> a <?=$dato['cDestino']?></p>
                                    </div>
                                    <div class="clases2">
                                        <p style="color:red;">- $<?=$dato['cantidad']?></p>
                                        <p class="fechaD"><?=$dato['fecha']?></p>
                                    </div>
                                 </li>
                            <?php }?>
                            <?php if($nCuenta == $dato['cDestino']){?>
                                <li class="columnasC">
                                    <div class="histo-img">
                                        <img src="/src/transferencia.png">
                                    </div>
                                    <div class="clases">
                                        <p><?=$dato['tipo']?> de <?=$dato['cOrigen']?></p>
                                    </div>
                                    <div class="clases2">
                                        <p style="color:green;">+ $<?=$dato['cantidad']?></p>
                                        <p class="fechaD"><?=$dato['fecha']?></p>
                                    </div>
                                 </li>
                            <?php }?>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
                                    <p class="fechaD"><?=$dato['fecha']?></p>
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
</html>