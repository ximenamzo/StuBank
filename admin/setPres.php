<?php
	session_start();

	$id = $_REQUEST['id'];
	$aux = $_REQUEST['aux'];

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM prestamos";
    $resultado = mysqli_query($mysqli,$obtencion);
    $prestamos = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($prestamos as $prestamo){
    	$cliente = $prestamo['solicitanteCl'];
    	$deuda = $prestamo['deuda'];
    }

    $pres = $mysqli->prepare("UPDATE prestamos SET estatus = ? WHERE idPrest = ?");
    $pres->bind_param('ii', $est, $idEst);
    $sal = $mysqli->prepare(("UPDATE clientes SET deuda = ? WHERE nCuenta = ?"));
    $sal->bind_param('ds', $d, $cuentaDest);

    if($aux == 1){
    	$idEst = $id;
    	$est = 2;
    	if($pres->execute()){
    		$cuentaDest = $cliente;
    		$d = $deuda;
    		$sal->execute();
    		echo '<script language="javascript">alert("Prestamo aprobado");window.location.href="prestamos.php"</script>';
    	}
    }else if($aux == 2){
    	$est = 3;
    	if($pres->execute()){
    		echo '<script language="javascript">alert("Prestamo rechazado");window.location.href="prestamos.php"</script>';
    	}
    }
?>