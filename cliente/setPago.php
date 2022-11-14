<?php
    require('../view/conexion.php');

	session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    $destino = $_POST['destino'];
    $dinero = $_POST['dinero'];

    $obtencion = "SELECT * FROM cuentas WHERE nCliente = '$cuenta' AND tipo = 2";
    $resultado = $mysqli->query($obtencion);
    $cuentaCred = $resultado->fetch_assoc();

    $saldo = $cuentaCred['saldo'];

    $obtencion2 = "SELECT * FROM prestamos WHERE id_prest = '$destino'";
    $resultado2 = $mysqli->query($obtencion2);
    $prestamo = $resultado2->fetch_assoc();

	$total = $prestamo['cantidad'];
	$deudaPres = $prestamo['deuda'];

    $deudaPresN = $deudaPres - $dinero;
    $saldoN = $saldo - $dinero;

    $clUpdate = $mysqli->prepare("UPDATE cuentas set saldo = ? WHERE cuenta = ?");
    $clUpdate->bind_param('ds', $sN, $cuen);

    $presUpdate = $mysqli->prepare("UPDATE prestamos set deuda = ?, estatus = ? WHERE id_prest = ?");
    $presUpdate->bind_param('dii', $dPN, $est, $iPrest);

    $trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, cOrigen, cDestino, tipo, cantidad) VALUES (?, ?, ?, ?, ?)");
    $trans->bind_param('ssssd', $tra, $or, $dest, $ti, $cant);

    $pago = $mysqli->prepare("INSERT INTO pagos (id_prest, cuenta, cantidad) VALUES (?, ?, ?)");
    $pago->bind_param('isd', $idP, $cu, $cant);

    $cuen = $cuentaCred['cuenta'];
    $sN = $saldoN;
    $dPN = $deudaPresN;
    $iPrest = $destino;
    $tra = $cuenta;
    $or = $cuentaCred['cuenta'];
    $dest = 'Banco';
    $ti = 'Pago';
    $cant = $dinero;
    $idP = $destino;
    $cu = $cuentaCred['cuenta'];

    if($deudaPresN == 0){
    	$est = 4;
    }else{
    	$est = 2;
    }

    if($clUpdate->execute()){
    	if($presUpdate->execute()){
    		if($trans->execute()){
    			if($pago->execute()){
    				echo '<script language="javascript">alert("Pago realizado correctamente.");</script>';

    				if($deudaPresN == 0){
    					echo '<script language="javascript">alert("Le informamos que ha TERMINADO de pagar su deuda.");</script>';
    				}
    			}
    		}
    	}
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <title>StuBank</title>
</head>
<body class="text-center">
    <img src="../src/StuBank.png" width="18%" class="mx-auto mb-2" style="margin: 7px 0 3px 0;"><br>

    <div style="width: 100%; display: flex; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
        <div style="color:grey; text-align:justify; width: 50%;">
        Conserve este comprobante. En caso de necesitar aclaraciones con el banco, usted podrá hacerlo dentro de los 60 días posteriores al pago presentando este formato.
        </div>
    </div>

    <div class="row" style="width: 100%; display: flex; justify-content: center;" id="GFG">
        <div class="card" style="width: 50%; display: flex; justify-content: center; padding: 1.7em 4em 1.7em 4em;">
            <h1>Comprobante de pago</h1><br>
            <p>Se realizó un pago de $<?=$dinero?> de la cuenta <?=$cuenta?> a un prestamo de <?=$total?></p>

            <table class="table">
                <tbody>
                    <tr>
                        <td style="text-align: left;">Fecha:</td>
                        <td style="text-align: right;"><?=date('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Deuda anterior:</td>
                        <td style="text-align: right;"><?=$deudaPres?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Deuda actual:</td>
                        <td style="text-align: right;"><?=$deudaPresN?></td>
                    </tr>
                </tbody>
            </table>

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


    </div><br><!--row-->

    <script>
        function imprimir(){
            print();
        }
    </script>
</body>
</html>