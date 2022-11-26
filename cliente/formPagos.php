<?php
    session_start();

    //$cl = $_SESSION['cuenta'];

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

    $obtencion = "SELECT * FROM cuentas WHERE cuenta = '$cl'";
    $resultado = $mysqli->query($obtencion);
    $cliente = $resultado->fetch_assoc();

    $tipo = $cliente['tipo'];
    $saldo = $cliente['saldo'];

    if($saldo < 8000){
        $max = $saldo;
    }else{
        $max = 8000;
    }
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
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-6">
            <h2 style="margin-bottom:1rem;">Pago de Servicio</h2>
            <div class="card">
                <div class="cont">
                    <form action="setPagos.php" method="POST">
                        </br>
                        <div class="row">
                            <div style="width:100%;">
                                <select name="destino" class="form-select" style="width: 100%; margin:0.7rem 0 0.7rem 0;" id="myselect" required>
                                    <option value="" disabled selected>Seleccione el servicio a pagar</option>
                                        <option value="CFE">CFE</option>
                                        <option value="CAPDAM">CAPDAM</option>
                                        <option value="TELMEX">TELMEX</option>
                                        <option value="TELCEL">TELCEL</option>
                                        <option value="INFONAVIT">INFONAVIT</option>
                                        <option value="SKY">SKY</option>
                                        <option value="TOTALPLAY">TOTALPLAY</option>
                                        <option value="IZZI">IZZI</option>
                                        <option value="TELCEL" hidden>TELCEL</option>
                                        <option value="MOVISTAR" hidden>MOVISTAR</option>
                                        <option value="AT&T"hidden>AT&T</option>
                                </select>
                            </div>
                            <div style="width:100%; margin:0.7rem 0 0 0;"><label class="form-label" for="referencia">Referencia: </label></div>
                            <div style="width:100%; margin:0 0 1rem 0;"><input class="form-control" type="text" name="referencia" id="referencia" minlength="7" maxlength="7" placeholder="7 dígitos" required></div>
                        </div>
                        <div class="row">
                            <div style="width:50%;"><label class="form-label" for="dinero">Monto:</label></div>
                            <div style="width:50%;"><label class="form-label" for="pass">Contraseña: </label></div>
                        </div>

                        <div class="row" style="margin-bottom:1rem;">
                            <div class="input-group mb-3" style="width:50%;">
                                <span class="input-group-text" id="basic-addon1">$</span>

                                <input class="form-control" type="number" name="dinero" id="dinero" placeholder="0.00" min="0" max="<?=$max?>" step="0.01" required>
                                
                                <?php if($tipo == 'D'):?>
                                <select name="divisa" class="input-group-text" style="width: 33%;">
                                    <option value="1" selected>MXN</option>
                                    <option value="2">USD</option>
                                </select>
                                <?php else:?>
                                    <span class="input-group-text" style="width: 25%;">MXN</span>
                                <?php endif;?>
                            </div>

                            <div style="width:50%;"><input class="form-control" type="password" name="pass" id="pass" required></div>
                        </div>

                        <div class="row">
                            <div style="width:70%;">
                                <div class="h-captcha" data-sitekey="d86ad688-fbcc-45d7-8cb4-ec8e394cdd80"></div>
                            </div>
                            <input type="hidden" name="cl" value="<?=$cl?>">
                            <?php //echo $cl?>
                            <?php //echo $cuenta?>
                            <div style="width:30%;">
                                <input class="btn btn-success" type="submit" value="Realizar Pago" style=" margin:0.5rem 0 0 0;">
                            </div>
                        </div>
                    </form>
                </div><!--cont-->
            </div><!--card-->
        </div><!--col md 6--><br>
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>