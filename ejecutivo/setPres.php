<?php	
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../view/conexion.php');

    $stmt_pres = $mysqli->prepare("INSERT INTO prestamos (solicitanteEje, solicitanteCl, cantidad, meses, deuda, metodo, estatus) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_pres->bind_param('ssdidii', $cuentaEje, $cuentaCl, $dinero, $meses, $deuda, $met, $estatus);

    $cuentaEje = $_SESSION['cuenta'];
    $cuentaCl = $_POST['destino'];
    $dinero = $_POST['dinero'];
    $meses = $_POST['meses'];
    $deuda = $_POST['deuda'];
    $met = $_POST['metodo'];
    $estatus = 1;

    if($stmt_pres->execute()){
    	$stmt_pres->close();
    	echo '<script language="javascript">alert("Prestamo solicitado, espere la respuesta de su tramite.");window.location.href="prestamos.php"</script>';
    }else{
    	echo "Oops!";
    }
?>


