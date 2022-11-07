<?php
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

	$idEje = $_REQUEST['id'];

	$stmt_borrar = $mysqli->prepare("UPDATE trabajadores SET estatus = ? WHERE nCuenta = ?");
    $stmt_borrar->bind_param("is",$est,$idEje);
    $est=2;

	if($stmt_borrar->execute()){
		header("Location: admin_eje.php");
	}else{
		echo "Error";
		echo $idEje;
	}
?>