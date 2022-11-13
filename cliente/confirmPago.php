<?php
    require('../view/conexion.php');
    require('../view/captcha.php');

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 3){
        header("Location: ../index.php");
    }

    $captcha = new Captcha();

    if($captcha->checkCaptcha($_POST['h-captcha-response'])){
        $destino = $_POST['pres'];
        $dinero = $_POST['dinero'];
        $pass = $_POST['pass'];
        $salt = "invalid";
        $passFull = md5($salt.$pass);
        $cuenta = $_SESSION['cuenta'];

        $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
        $resultado = $mysqli->query($obtencion);
        $cliente = $resultado->fetch_assoc();

        $passDB = $cliente['password'];

        if($passDB == $passFull){
            $obtencion3 = "SELECT * FROM cuentas WHERE nCliente = '$cuenta' AND tipo = 2";
            $resultado3 = $mysqli->query($obtencion3);
            $cuentaCred = $resultado3->fetch_assoc();

            $saldo = $cuentaCred['saldo'];

            if ($dinero > $saldo){
                echo '<script language="javascript">alert("Saldo en cuenta insuficiente");window.location.href="prestamos.php"</script>';
                die();
            }else{
                $obtencion2 = "SELECT * FROM prestamos WHERE id_prest = '$destino'";
                $resultado2 = $mysqli->query($obtencion2);
                $prestamo = $resultado2->fetch_assoc();

                $deuda = $prestamo['deuda'];
            }
            if($dinero > $deuda){
                echo '<script language="javascript">alert("No puedes pagar mas del total de la deuda");window.location.href="prestamos.php"</script>';
                die();
            }
        }else{
            echo '<script language="javascript">alert("Contraseña incorrecta");window.location.href="prestamos.php"</script>';
            die();
        }
    }else{
        echo '<script language="javascript">alert("Captcha incorrecto");window.location.href="prestamos.php"</script>';
        die();
    }
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
        <div class="col-md-9">
            Se abonarán $<?=$dinero?> a un prestamo con deuda de: $<?=$deuda?><br>
            La deuda restante será de: $<?=($deuda - $dinero)?><br>
            Su nuevo saldo en la cuenta de credito será de: $<?=($saldo-$dinero)?><br>
            ¿Desea continar?<br>
            <form action="setPago.php" method="POST" onsubmit="return acep(event)">
                <input type="hidden" name="destino" value="<?=$destino?>">
                <input type="hidden" name="dinero" value="<?=$dinero?>">
                <button class="btn btn-primary" type="submit">Continuar</button>
                <a href="prestamos.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
    <script language="javascript">
        const acep = _ => confirm("¿Proceder al pago?");
    </script>
</body>
</html>