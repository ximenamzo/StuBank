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
	<link rel="stylesheet" href="../src/css/ficha.css">
	<link rel="icon" type="image/png" href="../src/icono.png">
	<title>StuBank</title>
</head>
<body class="text-center">
	<img src="../src/StuBank.png" width="18%" class="mx-auto mb-2" style="margin: 7px 0 3px 0;"><br>

	<div style="width: 100%; display: flex; justify-content: center; margin: 5px 0 5px 0;">
        <div style="color:grey; text-align:justify; width: 50%;">
            Imprime y presenta este comprobante en cualquiera de las cajas de StuBank del estado para poder realizar el depósito a tu cuenta. Indica al cajero el valor exacto que figura en el presente comprobante.
        </div>
    </div>
	
	<div class="row" style="width: 100%; display: flex; justify-content: center;">
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

			<p>Se realizará un deposito de <b>$<?=$dinero?></b> a la cuenta <?=$cuentaCl?></p>

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
</html>