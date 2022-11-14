<?php
    $id = $_REQUEST['id'];
    $tipo = $_REQUEST['tipo'];

    require('../view/conexion.php');

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    $stmt_cuenta = $mysqli->prepare("INSERT INTO cuentas (nCliente, cuenta, tipo) VALUES (?, ?, ?)");
    $stmt_cuenta->bind_param('ssi', $id, $cuentaN, $tipo);
    $cuentaN = $id.'_'.$tipo;

    if($stmt_cuenta->execute()){
        echo '<script language="javascript">alert("Cuenta abierta con exito.");window.location.href="clientes.php"</script>';
    }
?>