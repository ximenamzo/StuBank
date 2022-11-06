<?php	
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

    $pres = $mysqli->prepare("INSERT INTO prestamos (solicitanteEje, solicitanteCl, cantidad, meses, deuda, metodo, estatus) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $pres->bind_param('ssdidii', $cuentaEje, $cuentaCl, $dinero, $meses, $deuda, $met, $estatus);

    $cuentaEje = $_SESSION['cuenta'];
    $cuentaCl = $_POST['destino'];
    $dinero = $_POST['dinero'];
    $meses = $_POST['meses'];
    $deuda = $_POST['deuda'];
    $met = $_POST['metodo'];
    $estatus = 1;

    if($pres->execute()){
    	$pres->close();
    	echo '<script language="javascript">alert("Prestamo solicitado, espere su aprobación");window.location.href="prestamos.php"</script>';
    }else{
    	echo "chin";
    }
?>