<?php
    $destino = $_POST['destino'];
    $referencia = $_POST['referencia'];
    $cl = $_POST['cl'];

    require('../view/conexion.php');
    require('../view/captcha.php');

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    $captcha = new Captcha();

    if(true){
        $pass = $_POST['pass'];
        $salt = "invalid";
        $passFull = md5($salt.$pass);
        $cuenta = $_SESSION['cuenta'];

        $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
        $resultado = $mysqli->query($obtencion);
        $cliente = $resultado->fetch_assoc();

        $passDB = $cliente['password'];

        if($passDB == $passFull){
            //$obtencion2 = "SELECT * FROM cuentas WHERE cuenta = '$destino'";
            //$resultado2 = $mysqli->query($obtencion2);
            //$dest = $resultado2->fetch_assoc();

            //$tipoDest = $dest['tipo'];
            //$saldoDest = $dest['saldo'];

            $obtencion3 = "SELECT * FROM cuentas WHERE cuenta = '$cl'";
            $resultado3 = $mysqli->query($obtencion3);
            $ori = $resultado3->fetch_assoc();

            $tipoOri = $ori['tipo'];
            $saldoOri = $ori['saldo'];

            $dinero = $_POST['dinero'];

            if($saldoOri < $dinero){
                echo '<script language="javascript">alert("Insuficiente saldo en la cuenta seleccionada para realizar este pago.");window.location.href="movimientos.php"</script>';
                die();
            }

            if($dinero > 8000){
                echo '<script language="javascript">alert("No se pueden realizar pagos de mas de $8,000.");window.location.href="movimientos.php"</script>';
                die();
            }

            $newSaldoOri = $saldoOri - $dinero;

            $stmt_trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, solicitante, cOrigen, cDestino, tipo, cantidad, referencia) VALUES (?,?,?,?,?,?,?)");
            $stmt_trans->bind_param("sssssds", $cuenta, $cuenta, $cl, $destino, $tipo, $dinero, $referencia);
            $tipo = 'Pago de Servicio';

            $stmt_ori = $mysqli->prepare("UPDATE cuentas SET saldo = ? WHERE cuenta = ?");
            $stmt_ori->bind_param("ds", $newSaldoOri, $cl);

            if(!$stmt_trans->execute()){
                echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            }else{
                if(!$stmt_ori->execute()){
                    echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
                }else{
                    echo '<script language="javascript">alert("Pago exitoso.");</script>';
                }
            }
        }else{
            echo '<script language="javascript">alert("Contraseña incorrecta");window.location.href="movimientos.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Captcha incorrecto");window.location.href="movimientos.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link rel="stylesheet" href="../src/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <title>StuBank</title>
</head>
<body class="text-center">
    <img src="../src/StuBank.png" width="18%" class="mx-auto mb-2" style="margin: 7px 0 3px 0;"><br>
    <?php //echo $cuenta, $cuenta, $cl, $destino, $tipo, $dinero, $referencia?>
    <div style="width: 100%; display: flex; justify-content: center; margin: 5px 0 5px 0;">
        <div style="color:grey; text-align:justify; width: 50%;">
            Conserve este comprobante. En caso de necesitar aclaraciones con el banco, usted podrá hacerlo dentro de los 60 días posteriores al movimiento presentando esta ficha.
        </div>
    </div>
	
	<div class="row" style="width: 100%; display: flex; justify-content: center;">
		<div class="card" style="width: 50%; display: flex; justify-content: center; padding: 1.7em 4em 1.7em 4em;">
			<h1>Comprobante de Pago</h1><br>

            <table class="table">
                <tbody>
                    <tr>
                        <td style="text-align: left;">Cuenta de Origen:</td>
                        <td style="text-align: right;"><?=$cl?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Servicio pagado:</td>
                        <td style="text-align: right;"><?=$destino?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Referencia de Pago:</td>
                        <td style="text-align: right;"><?=$referencia?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Fecha:</td>
                        <td style="text-align: right;"><?=date('d-m-Y');?></td>
                    </tr>
                </tbody>
            </table>

			<p>Pago a <?=$destino?> de <b>$<?=$dinero?></b></p>

            <div style="display: flex; justify-content: center;">
                <div class="row" style="width: auto;">
                    <img src="../src/barcode.png" style="width: 13pc;"><br><br>
                </div>
            </div>
		</div><!--card-->
        

        <div style="margin-top: 1em;">
            <button class="btn btn-success" onclick="imprimir()">Imprimir</button>
            &nbsp;
            <a href="movimientos.php" class="btn btn-secondary">Regresar</a><br>
        </div>


	</div><br>

    <script>
        function imprimir(){
            print();
        }
    </script>
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>