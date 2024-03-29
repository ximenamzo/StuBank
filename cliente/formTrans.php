<?php
    $destino = $_POST['id'];
    $cl = $_POST['cl'];
    
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

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
            <h1>Transferencia bancaria</h1>
            
            <div class="card">
                <div class="cont">
                    <form action="setTrans.php" method="POST">
                        </br>
                        <div class="row" style="margin-bottom:1rem;">
                            <div style="width:80%;">
                                <label class="form-label" for="dinero">Monto y divisa:</label>
                                <div class="row" style="padding:0 0 0 3%;">                          
                                    <span class="input-group-text" id="basic-addon1" style="width: 15%;">$</span>
                                    <input class="form-control" style="width: 50%;" type="number" name="dinero" id="dinero" placeholder="0.00" min="0" max="<?=$max?>" step="0.01" required>
                                    <?php if($tipo == 'D'):?>
                                        <select name="divisa" class="input-group-text" style="width: 33%;">
                                            <option value="1" selected>MXN</option>
                                            <option value="2">USD</option>
                                        </select>
                                    <?php else:?>
                                            <span class="input-group-text" style="width: 20%;">MXN</span>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:1rem;">
                            <div style="width:60%;">
                                <label class="form-label" for="motivo">Motivo de pago (opcional):</label>
                                <input class="form-control" type="text" name="motivo" id="motivo" maxlength="20">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:1rem;">
                            <div style="width:50%;">
                                <label class="form-label" for="pass">Contraseña: </label>
                                <input class="form-control" type="password" name="pass" id="pass" required>
                            </div>
                        </div>


                        <div class="mt-3 mx-auto">
                            <div class="h-captcha" data-sitekey="d86ad688-fbcc-45d7-8cb4-ec8e394cdd80"></div>
                        </div><h6></h6>
                        <input type="hidden" name="destino" value="<?=$destino?>">
                        <input type="hidden" name="cl" value="<?=$cl?>">
                        <input class="btn btn-success" type="submit" value="Realizar transferencia">

                    </form>
                </div><!--cont-->
            </div><!--card-->
        </div><!--col md 6-->
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>