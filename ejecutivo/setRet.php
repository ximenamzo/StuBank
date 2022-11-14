<?php
	require('../view/conexion.php');
	require('../view/captcha.php');

	session_start();

	$rol = $_SESSION['rol'];

	if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

	$captcha = new Captcha();

	if($captcha->checkCaptcha($_POST['h-captcha-response'])){
		$pass = $_POST['pass'];
		$salt = "invalid";
		$passFull = md5($salt.$pass);
		$cuentaEje = $_SESSION['cuenta'];

	    $obtencion = "SELECT * FROM trabajadores WHERE nCuenta = '$cuentaEje'";
    	$resultado = $mysqli->query($obtencion);
    	$ejecutivo = $resultado->fetch_assoc();

		$passDB = $ejecutivo['password'];
		$apePEje = $ejecutivo['apellidoP'];
		$apeMEje = $ejecutivo['apellidoM'];

    	if($passDB == $passFull){
			$nombreEje = $_SESSION['nombre'];
		    $cuenta = $_POST['idCl'];
		    $dinero = $_POST['dinero'];

	    	$obtencion2 = "SELECT * FROM cuentas WHERE cuenta = '$cuenta'";
	    	$resultado2 = $mysqli->query($obtencion2);
	    	$cuentaRet = $resultado2->fetch_assoc();

	    	$cuentaCl = $cuentaRet['nCliente'];
	    	$tipoCuenta = $cuentaRet['tipo'];
	    	$saldo = $cuentaRet['saldo'];

	    	$obtencion3 = "SELECT * FROM clientes WHERE nCuenta = '$cuentaCl'";
	    	$resultado3 = $mysqli->query($obtencion3);
	    	$cliente = $resultado3->fetch_assoc();

    		$nombreCl = $cliente['nombre'];
    		$apePCl = $cliente['apellidoP'];
    		$apeMCl = $cliente['apellidoM'];

	    	if($dinero > 15000){
	    		echo '<script language="javascript">alert("No se pueden realizar retiros de mas de $15,000");window.location.href="movimientos.php"</script>';
	    		die();
	    	}
	    	
	    	if($tipoCuenta == 4){
    			$divisa = $_POST['divisa'];
	    		if($divisa == 1){
	    			$dinero = $dinero / 20;
	    			$newSaldo = $saldo - $dinero;
	    		}else{
	    			$newSaldo = $saldo - $dinero;
	    		}
    		}else{
    			$newSaldo = $saldo - $dinero;
    		}

	    	if($saldo < $dinero){
	    		echo '<script language="javascript">alert("Fondos insuficientes");window.location.href="movimientos.php"</script>';
	    		die();
	    	}

			//$mysqli->query("INSERT INTO `transacciones` (`cTramitador`, `cOrigen`, `cDestino`, `tipo`, `cantidad`) VALUES ('$cuentaEje', '$cuentaCl', 'Externo', 'Retiro', '$dinero')")
			$stmt_trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, solicitante, cOrigen, cDestino, tipo, cantidad) VALUES (?,?,?,?,?,?)");
			$stmt_trans->bind_param("sssssd", $cuentaEje, $cuentaCl, $cuenta, $ext, $ret, $dinero);
			$ext = 'Externo';
			$ret = 'Retiro';

			//$mysqli->query("UPDATE clientes SET saldo = '$newSaldo' WHERE nCuenta = '$cuentaCl'")
			$stmt_saldo = $mysqli->prepare("UPDATE cuentas SET saldo = ? WHERE cuenta = ?");
			$stmt_saldo->bind_param("ds",$newSaldo,$cuenta);

	    	if(!$stmt_trans->execute()){
	    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
	    	}else{
	    		if(!$stmt_saldo->execute()){
	    			echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
	    		}
	    	}
    	}else{
    		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="movimientos.php"</script>';
    	}
	}else{
		echo '<script language="javascript">alert("Captcha incorrecto.");window.location.href="movimientos.php"</script>';
	}

	$tiposCuenta = ['', 'Debito', 'Credito', 'Ahorro','Dolares'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="../src/css/ficha.css">
	<link rel="icon" type="image/png" href="../src/icono.png">
	<title>StuBank</title>
</head>
<body class="text-center">
	<img src="../src/StuBank.png" width="18%" class="mx-auto mb-2" style="margin: 7px 0 3px 0;"><br>

	<div style="width: 100%; display: flex; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
		<div style="color:grey; text-align:justify; width: 50%;">
			Imprime y presenta este comprobante en cualquiera de las cajas de StuBank del estado para poder realizar el retiro desde tu cuenta. Indica al cajero el valor exacto que figura en el presente comprobante.
		</div>
	</div>

	<div class="row" style="width: 100%; display: flex; justify-content: center;" id="GFG">
		<div class="card" style="width: 50%; display: flex; justify-content: center; padding: 1.7em 4em 1.7em 4em;">
			<h1>Ficha de retiro</h1><br>

			<table class="table">
				<tbody>
					<tr>
						<td style="text-align: left;">Tramitado por:</td>
						<td style="text-align: right;"><?=$nombreEje." ".$apePEje." ".$apeMEje?></td>
					</tr>
					<tr>
						<td style="text-align: left;">Solicitante:</td>
						<td style="text-align: right;"><?=$nombreCl." ".$apePCl." ".$apeMCl?></td>
					</tr>
					<tr>
						<td style="text-align: left;">Fecha:</td>
						<td style="text-align: right;"><?=date('d-m-Y');?></td>
					</tr>
				</tbody>
			</table>

			<?php if($tipoCuenta == 4):?>
				<p>Se realizará un retiro de <b>$<?=$dinero?> USD</b> de la cuenta de <?=$tiposCuenta[$cuentaRet['tipo']].' '.$cuentaCl?></p>
			<?php else:?>
				<p>Se realizará un retiro de <b>$<?=$dinero?> MXN</b> de la cuenta de <?=$tiposCuenta[$cuentaRet['tipo']].' '.$cuentaCl?></p>
			<?php endif?>

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