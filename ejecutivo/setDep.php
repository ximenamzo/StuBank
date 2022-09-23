<?php
	require('../view/conexion.php');
	require('../view/captcha.php');

	session_start();

	$captcha = new Captcha();

	if($captcha->checkCaptcha($_POST['h-captcha-response'])){
		$nombreEje = $_SESSION['nombre'];
	    $rol = $_SESSION['rol'];
	    $cuentaEje = $_SESSION['cuenta'];
	    $cuentaCl = $_POST['idCl'];
	    $dinero = $_POST['dinero'];

	    $obtencion = "SELECT * FROM trabajadores WHERE nCuenta = '$cuentaEje'";
    	$resultado = mysqli_query($mysqli,$obtencion);
    	$ejecutivos = $resultado->fetch_all(MYSQLI_ASSOC);

    	$obtencion2 = "SELECT * FROM clientes WHERE nCuenta = '$cuentaCl'";
    	$resultado2 = mysqli_query($mysqli,$obtencion2);
    	$clientes = $resultado2->fetch_all(MYSQLI_ASSOC);

    	foreach($ejecutivos as $ejecutivo):
    		$apePEje = $ejecutivo['apelldoP'];
    		$apeMEje = $ejecutivo['apellidoM'];
    	endforeach;

    	foreach($clientes as $cliente):
    		$apePCl = $ejecutivo['apellidoP'];
    		$apeMCl = $ejecutivo['apellidoM'];
    	endforeach;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StuBank</title>
</head>
<body>
	<img src="../src/StuBank.png" class="mx-auto">
</body>
</html>