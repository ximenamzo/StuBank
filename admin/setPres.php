<?php
	session_start();

	$id = $_REQUEST['id'];
	$aux = $_REQUEST['aux'];

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM prestamos where id_prest = $id";
    $resultado = mysqli_query($mysqli,$obtencion);
    $prestamos = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($prestamos as $prestamo){
        $ejecutivo = $prestamo['solicitanteEje'];
    	$cliente = $prestamo['solicitanteCl'];
        $cantidad = $prestamo['cantidad'];
    	$deuda = $prestamo['deuda'];
        $metodo = $prestamo['metodo'];
    }

    $obtencion2 = "SELECT * FROM clientes where nCuenta = $cliente";
    $resultado2 = mysqli_query($mysqli,$obtencion2);
    $clientes = $resultado2->fetch_all(MYSQLI_ASSOC);

    foreach($clientes as $client){
        $oldS = $client['saldo'];
    }

    $pres = $mysqli->prepare("UPDATE prestamos SET estatus = ? WHERE id_prest = ?");
    if (!$pres) {
        echo "Error en {$mysqli->error}";
        die;
    }
    $pres->bind_param('ii', $est, $idEst);
    $sal = $mysqli->prepare("UPDATE clientes SET saldo = ?, deuda = ? WHERE nCuenta = ?");
    $sal->bind_param('dds', $c, $d, $cuentaDest);
    $deu = $mysqli->prepare("UPDATE clientes SET deuda = ? WHERE nCuenta = ?");
    $deu->bind_param('ds', $d, $cuentaDest);
    $trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, solicitante, cOrigen, cDestino, tipo, cantidad) VALUES (?, ?, ?, ?, ?, ?)");
    $trans->bind_param('sssssd', $tram, $sol, $or, $dest, $tip, $cant);

    $idEst = $id;
    $cuentaDest = $cliente;
    $c = $oldS + $cantidad;
    $d = $deuda;
    $tram = $ejecutivo;
    $sol = $cliente;
    $or = 'Banco';
    $tip = 'Prestamo';
    $cant = $cantidad;

    if($aux == 1){
    	$est = 2;
    	if($pres->execute()){
            if($metodo == 2){
                $dest = $cliente;
        		if($sal->execute()){
                    if($trans->execute()){
                        echo '<script language="javascript">alert("Prestamo aprobado, saldo y deuda actualizados");window.location.href="prestamos.php"</script>';
                    }
                }
            }else{
                $dest = 'Externo';
                if($deu->execute()){
                    if($trans->execute()){
                        echo '<script language="javascript">alert("Prestamo aprobado, imprima la ficha de pago desde el menú de ejecutivo");window.location.href="prestamos.php"</script>';
                    }
                }
            }
    	}
    }else if($aux == 2){
    	$est = 3;
    	if($pres->execute()){
    		echo '<script language="javascript">alert("Prestamo rechazado");window.location.href="prestamos.php"</script>';
    	}
    }
?>