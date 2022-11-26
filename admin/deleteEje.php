<?php
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

	$idEje = $_REQUEST['id'];

    $obtencion = "SELECT * FROM clientes WHERE nEjecutivo = '$idEje'";
    $resultado = $mysqli->query($obtencion);

    if($resultado->num_rows > 0){
        echo '<script language="javascript">alert("Ejecutivo con clientes asignados, reasigne sus clientes a otro ejecutivo para proceder");window.location.href="admin_eje.php"</script>';
        die();
    }

	$stmt_borrar = $mysqli->prepare("UPDATE trabajadores SET estatus = ? WHERE nCuenta = ?");
    $stmt_borrar->bind_param("is",$est,$idEje);
    $est=2;

    if($stmt_borrar->execute()){
        echo '<script language="javascript">alert("Ejecutivo dado de baja correctamente");window.location.href="admin_eje.php"</script>';
    }else{
        echo "Ha currido un error";
    }
?>