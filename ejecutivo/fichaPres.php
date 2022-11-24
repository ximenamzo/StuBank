<?php
	session_start();

	include('../view/conexion.php');

    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

	$idPres = $_REQUEST['id'];
	
	$obtencion = "SELECT * FROM prestamos WHERE id_prest = '$idPres'";
    $resultado = $mysqli->query($obtencion);
    $prestamo = $resultado->fetch_assoc();

	$tramitador = $prestamo['solicitanteEje'];
	$solicitante = $prestamo['solicitanteCl'];
	$cantidad = $prestamo['cantidad'];
	$fecha = $prestamo['fecha'];

    $obtencion2 = "SELECT * FROM trabajadores WHERE nCuenta = '$tramitador'";
    $resultado2 = $mysqli->query($obtencion2);
    $ejecutivo = $resultado2->fetch_assoc();

	$nomEje = $ejecutivo['nombre'];
	$aPEje = $ejecutivo['apellidoP'];
	$aMEje = $ejecutivo['apellidoM'];

    $obtencion3 = "SELECT nombre, apellidoP, apellidoM FROM clientes as cl, cuentas as cu WHERE cu.nCliente = cl.nCuenta AND cu.cuenta = '$solicitante'";
    $resultado3 = $mysqli->query($obtencion3);
    $cliente = $resultado3->fetch_assoc();

	$nomCl = $cliente['nombre'];
	$aPCl = $cliente['apellidoP'];
	$aMCl = $cliente['apellidoM'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="../src/css/ficha.css">
	<link rel="stylesheet" href="../src/css/estilos.css">
	<link rel="icon" type="image/png" href="../src/icono.png">
	    <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>
<body class="text-center">
	<img src="../src/StuBank.png" width="18%" class="mx-auto mb-2" style="margin: 7px 0 3px 0;"><br>

    <div style="width: 100%; display: flex; justify-content: center; margin: 5px 0 5px 0;">
        <div style="color:grey; text-align:justify; width: 50%;">
            Imprime y presenta este comprobante en cualquiera de las cajas de StuBank del estado para poder recibir tu préstamo en efectivo. Indica al cajero el valor exacto que figura en el presente comprobante.
        </div>
    </div>
	
	<div class="row" style="width: 100%; display: flex; justify-content: center;">
		<div class="card" style="width: 50%; display: flex; justify-content: center; padding: 1.7em 4em 1.7em 4em;">
			<h1>Ficha de prestamo</h1><br>

            <table class="table">
                <tbody>
                    <tr>
                        <td style="text-align: left;">Tramitado por:</td>
                        <td style="text-align: right;"><?=$nomEje." ".$aPEje." ".$aMEje?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Solicitante:</td>
                        <td style="text-align: right;"><?=$nomCl." ".$aPCl." ".$aMCl?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Fecha:</td>
                        <td style="text-align: right;"><?=$fecha?></td>
                    </tr>
                </tbody>
            </table>

			<p>Se realizará un pago en efectivo de <b>$<?=$cantidad?></b> al cliente <?=$nomCl." ".$aPCl." ".$aMCl?></p>

            <div style="display: flex; justify-content: center;">
                <div class="row" style="width: auto;">
                    <img src="../src/barcode.png" style="width: 13pc;"><br><br>
                </div>
            </div>
		</div><!--card-->
        

        <div style="margin-top: 1em;">
            <button class="btn btn-success" onclick="imprimir()">Imprimir</button>
            &nbsp;
            <a href="prestamos.php" class="btn btn-secondary">Regresar</a><br>
        </div>


	</div><br>



	<script>
		function imprimir(){
			print();
		}
	</script>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>