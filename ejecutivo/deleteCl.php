<?php
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

	$idCl = $_REQUEST['id'];

    $stmt_borrar = $mysqli->prepare("UPDATE clientes SET estatus = ? WHERE nCuenta = ?");
    $stmt_borrar->bind_param("is",$est,$idCl);
    $est=2;

	if($stmt_borrar->execute()){
		header("Location: ejecutivo.php");
	}else{
		echo "Error";
		echo $idCl;
	}
?>