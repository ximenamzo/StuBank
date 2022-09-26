<?php
	require('../view/conexion.php');
	require('../view/captcha.php');

	session_start();

	$captcha = new Captcha();

	if($captcha->checkCaptcha($_POST['h-captcha-response'])){
		$pass = $_POST['pass'];
		$salt = "invalid";
		$passFull = md5($salt.$pass);
		$cuentaEje = $_SESSION['cuenta'];

	    $obtencion = "SELECT * FROM trabajadores WHERE nCuenta = '$cuentaEje'";
    	$resultado = mysqli_query($mysqli,$obtencion);
    	$ejecutivos = $resultado->fetch_all(MYSQLI_ASSOC);

    	foreach($ejecutivos as $ejecutivo):
    		$passDB = $ejecutivo['password'];
    		$apePEje = $ejecutivo['apelldoP'];
    		$apeMEje = $ejecutivo['apellidoM'];
    	endforeach;
    	if($passDB == $passFull){
			$nombreEje = $_SESSION['nombre'];
		    $rol = $_SESSION['rol'];
		    $cuentaCl = $_POST['idCl'];
		    $dinero = $_POST['dinero'];

	    	$obtencion2 = "SELECT * FROM clientes WHERE nCuenta = '$cuentaCl'";
	    	$resultado2 = mysqli_query($mysqli,$obtencion2);
	    	$clientes = $resultado2->fetch_all(MYSQLI_ASSOC);


	    	foreach($clientes as $cliente):
	    		$nombreCl = $cliente['nombre'];
	    		$apePCl = $cliente['apellidoP'];
	    		$apeMCl = $cliente['apellidoM'];
	    		$saldo = $cliente['saldo'];
	    	endforeach;

	    	$newSaldo = $saldo + $dinero;

	    	if(!$mysqli->query("INSERT INTO `transacciones` (`cTramitador`, `cOrigen`, `cDestino`, `tipo`, `cantidad`) VALUES ('$cuentaEje', 'Externo', '$cuentaCl', 'Deposito', '$dinero')")){
	    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
	    	}else{
	    		if(!$mysqli->query("UPDATE clientes SET saldo = '$newSaldo' WHERE nCuenta = '$cuentaCl'")){
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
	<title>StuBank</title>
</head>
<body class="text-center">
	<img src="../src/StuBank.png" class="mx-auto mb-3">
	<center><div class="border border-success w-50">
		<h1>Ficha de deposito</h1>
		<p>Tramitado por: <?=$nombreEje." ".$apePEje." ".$apeMEje?></p>
		<p>Solicitado por: <?=$nombreCl." ".$apePCl." ".$apeMCl?></p>
		<p>El dia: <?=date('d-m-Y');?></p>
		<p>Se realizará un deposito de $<?=$dinero?> a la cuenta <?=$cuentaCl?></p>
		<img src="../src/barcode.png" style="width: 13pc;"><br><br>
		<p>Muestre esta ficha en caja para efectuar el tramite</p>

		<a href="movimientos.php" class="btn btn-secondary">Regresar</a>
		<button class="btn btn-success" onclick="imprimir()">Imprimir</button>
	</div></center>

	<script>
		function imprimir(){
			print();
		}
	</script>
</body>
</html>