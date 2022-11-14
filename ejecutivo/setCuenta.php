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

    $stmt_cuenta = $mysqli->prepare("INSERT INTO cuentas (nCliente, cuenta, tipo, titulo) VALUES (?, ?, ?, ?)");
    $stmt_cuenta->bind_param('ssss', $id, $cuentaN, $tipo, $titulo);
    $cuentaN = $id.$tipo;

    if($tipo == 'A'){
        $titulo = 'Débito';
    }elseif($tipo == 'B'){
        $titulo = 'Crédito';
    }elseif($tipo == 'C'){
        $titulo = 'Ahorro';
    }elseif($tipo == 'D'){
        $titulo = 'Dólares';
    }elseif($tipo == 'E'){
        $titulo = 'Débito (secundaria)';
    }

    if($stmt_cuenta->execute()){
        echo '<script language="javascript">alert("Cuenta abierta con exito.");window.location.href="ejecutivo.php"</script>';
    }
?>