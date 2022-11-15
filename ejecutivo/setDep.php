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

		    if($dinero > 19000){
		    	echo '<script language="javascript">alert("No se pueden realizar depositos de mas de $19,000");window.location.href="movimientos.php"</script>';
		    	die();
		    }

    		$obtencion2 = "SELECT * FROM cuentas WHERE cuenta = '$cuenta'";
	    	$resultado2 = $mysqli->query($obtencion2);
	    	$cuentaDep = $resultado2->fetch_assoc();

	    	$cuentaCl = $cuentaDep['nCliente'];
	    	$tipoCuenta = $cuentaDep['tipo'];
	    	$saldo = $cuentaDep['saldo'];

	    	if($tipoCuenta == 'D'){
	    		$divisa = $_POST['divisa'];
	    		if($divisa == 1){
	    			$dinero = $dinero / 20;
	    			$newSaldo = $saldo + $dinero;
	    		}else{
	    			$newSaldo = $saldo + $dinero;	
	    		}
	    	}else{
	    		$newSaldo = $saldo + $dinero;
	    	}

	    	$obtencion3 = "SELECT * FROM clientes WHERE nCuenta = '$cuentaCl'";
	    	$resultado3 = $mysqli->query($obtencion3);
	    	$cliente = $resultado3->fetch_assoc();

    		$nombreCl = $cliente['nombre'];
    		$apePCl = $cliente['apellidoP'];
    		$apeMCl = $cliente['apellidoM'];

			$stmt_trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, solicitante, cOrigen, cDestino, tipo, cantidad) VALUES (?,?,?,?,?,?)");
			$stmt_trans->bind_param("sssssd", $cuentaEje, $cuentaCl, $ext, $cuenta, $dep, $dinero);
			$ext = 'Externo';
			$dep = 'Deposito';

			$stmt_saldo = $mysqli->prepare("UPDATE cuentas SET saldo = ? WHERE cuenta = ?");
			$stmt_saldo->bind_param("ds", $newSaldo, $cuenta);


	    	if(!$stmt_trans->execute()){
	    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
	    	}else{
	    		if(!$stmt_saldo->execute()){
	    			echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
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

	<div style="width: 100%; display: flex; justify-content: center; margin: 5px 0 5px 0;">
        <div style="color:grey; text-align:justify; width: 50%;">
            Conserve este comprobante. En caso de necesitar aclaraciones con el banco, usted podrá hacerlo dentro de los 60 días posteriores al movimiento presentando esta ficha.
        </div>
    </div>
	
	<div class="row" style="width: 100%; display: flex; justify-content: center;" id="">
		<div class="card" style="width: 50%; display: flex; justify-content: center; padding: 1.7em 4em 1.7em 4em;">
			<h1>Ficha de depósito</h1><br>

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

            <?php if($tipoCuenta == 'D'):?>
            	<p>Se realizó un deposito de <b>$<?=$dinero?> USD</b> a la cuenta <?=$cuenta?></p>
            <?php else:?>
				<p>Se realizó un deposito de <b>$<?=$dinero?> MXN</b> a la cuenta <?=$cuenta?></p>
			<?php endif;?>

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


	</div><br><!--Row-->

	<script>
		function imprimir(){
			print();
		}
	</script>
</body>
</html>