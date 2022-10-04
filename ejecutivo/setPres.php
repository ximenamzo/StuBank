<?php	
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../view/conexion.php');

    $pres = $mysqli->prepare("INSERT INTO prestamos (solicitanteEje, solicitanteCl, cantidad, meses, deuda, estatus) VALUES (?, ?, ?, ?, ?, ?)");

    $pres->bind_param('ssdidi', $cuentaEje, $cuentaCl, $dinero, $meses, $dinero, $estatus);

    $cuentaEje = $_SESSION['cuenta'];
    $cuentaCl = $_POST['destino'];
    $dinero = $_POST['dinero'];
    $meses = $_POST['meses'];
    $estatus = 1;

    if($pres->execute()){
    	$pres->close();
    	echo '<script language="javascript">alert("Prestamo solicitado, espere su aprobación");window.location.href="prestamos.php"</script>';
    }else{
    	echo "chin";
    }
?>