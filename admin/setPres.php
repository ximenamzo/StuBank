<?php
	session_start();

	$id = $_REQUEST['id'];
	$aux = $_REQUEST['aux'];

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM prestamos where id_prest = $id";
    $resultado = $mysqli->query($obtencion);
    $prestamo = $resultado->fetch_assoc();

    $ejecutivo = $prestamo['solicitanteEje'];
	$clienteCred = $prestamo['solicitanteCl'];
    $cantidad = $prestamo['cantidad'];
	$deuda = $prestamo['deuda'];
    $metodo = $prestamo['metodo'];

    $obtencion2 = "SELECT * FROM cuentas where cuenta = '$clienteCred'";
    $resultado2 = $mysqli->query($obtencion2);
    $cuentaCred = $resultado2->fetch_assoc();

    $cliente = $cuentaCred['nCliente'];
    $cuenta = $cuentaCred['cuenta'];
    $oldS = $cuentaCred['saldo'];

    $stmt_pres = $mysqli->prepare("UPDATE prestamos SET estatus = ? WHERE id_prest = ?");
    if (!$stmt_pres) {
        echo "Error en {$mysqli->error}";
        die;
    }
    $stmt_pres->bind_param('ii', $est, $idEst);

    $stmt_sal = $mysqli->prepare("UPDATE cuentas SET saldo = ? WHERE cuenta = ?");
    $stmt_sal->bind_param('ds', $c, $cuentaDest);
    
    $stmt_trans = $mysqli->prepare("INSERT INTO transacciones (cTramitador, solicitante, cOrigen, cDestino, tipo, cantidad) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_trans->bind_param('sssssd', $tram, $sol, $or, $dest, $tip, $cant);

    $idEst = $id;
    $cuentaDest = $cuenta;
    $c = $oldS + $cantidad;
    $tram = $ejecutivo;
    $sol = $cliente;
    $or = 'Banco';
    $tip = 'Prestamo';
    $cant = $cantidad;

    if($aux == 1){
    	$est = 2;
    	if($stmt_pres->execute()){
            if($metodo == 2){
                $dest = $cuenta;
        		if($stmt_sal->execute()){
                    if($stmt_trans->execute()){
                        echo '<script language="javascript">alert("Prestamo aprobado. Dinero depositado a la cuenta de crédito.");window.location.href="prestamos.php"</script>';
                    }
                }
            }else{
                $dest = 'Externo';
                if($stmt_trans->execute()){
                    echo '<script language="javascript">alert("Prestamo aprobado, imprima la ficha de pago desde el menú de ejecutivo.");window.location.href="prestamos.php"</script>';
                }   
            }
    	}
    }else if($aux == 2){
    	$est = 3;
    	if($stmt_pres->execute()){
    		echo '<script language="javascript">alert("Prestamo rechazado.");window.location.href="prestamos.php"</script>';
    	}
    }
?>