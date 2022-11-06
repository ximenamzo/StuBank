<?php
    require('../view/conexion.php');

	session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 3){
        header("Location: ../index.php");
    }

    $destino = $_POST['destino'];
    $dinero = $_POST['dinero'];

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($clientes as $cliente){
    	$saldo = $cliente['saldo'];
    	$deudaCl = $cliente['deuda'];
    }

    $obtencion2 = "SELECT * FROM prestamos WHERE id_prest = '$destino'";
    $resultado2 = mysqli_query($mysqli,$obtencion2);
    $prestamos = $resultado2->fetch_all(MYSQLI_ASSOC);

    foreach ($prestamos as $prestamo){
    	$total = $prestamo['cantidad'];
    	$deudaPres = $prestamo['deuda'];
    }

    $deudaClN = $deudaCl - $dinero;
    $deudaPresN = $deudaPres - $dinero;
    $saldoN = $saldo - $dinero;

    $clUpdate = $mysqli->prepare("UPDATE clientes set saldo = ?, deuda = ? WHERE nCuenta = ?");
    $clUpdate->bind_param('dds', $sN, $dClN, $cuen);
    $presUpdate = $mysqli->prepare("UPDATE prestamos set deuda = ?, estatus = ? WHERE id_prest = ?");
    $presUpdate->bind_param('dii', $dPN, $est, $iPrest);
    $trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, cOrigen, cDestino, tipo, cantidad) VALUES (?, ?, ?, ?, ?)");
    $trans->bind_param('ssssd', $tra, $or, $dest, $ti, $cant);
    $pago = $mysqli->prepare("INSERT INTO pagos (id_prest, cuenta, cantidad) VALUES (?, ?, ?)");
    $pago->bind_param('isd', $idP, $cu, $cant);

    $cuen = $cuenta;
    $sN = $saldoN;
    $dClN = $deudaClN;
    $dPN = $deudaPresN;
    $iPrest = $destino;
    $tra = $cuenta;
    $or = $cuenta;
    $dest = 'Banco';
    $ti = 'Pago';
    $cant = $dinero;
    $idP = $destino;
    $cu = $cuenta;

    if($deudaPresN == 0){
    	$est = 4;
    }else{
    	$est = 2;
    }

    if($clUpdate->execute()){
    	if($presUpdate->execute()){
    		if($trans->execute()){
    			if($pago->execute()){
    				echo '<script language="javascript">alert("Pago realizado correctamente");</script>';

    				if($deudaPresN == 0){
    					echo '<script language="javascript">alert("Felicidades, ha pagado su prestamo");</script>';
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
    <img src="../src/StuBank.png" class="mx-auto mb-3">
    <center><div class="border border-success w-50">
        <h1>Recibo de pago</h1>
        <p>Se realizó un pago de $<?=$dinero?> de la cuenta <?=$cuenta?> a un prestamo de <?=$total?></p>
        <p>El dia: <?=date('d-m-Y');?></p>

        <p>Deuda anterior: <?=$deudaPres?></p>
        <p>Deuda actual: <?=$deudaPresN?></p>
        <img src="../src/barcode.png" style="width: 13pc;"><br><br>

        <a href="cuenta.php" class="btn btn-secondary">Regresar</a>
        <button class="btn btn-success" onclick="imprimir()">Imprimir</button>
    </div></center>

    <script>
        function imprimir(){
            print();
        }
    </script>
</body>
</html>