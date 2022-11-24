<?php
    session_start();

    include('../view/conexion.php');

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        session_destroy();
        header("Location: ../");
        die();
    }

    $id = $_REQUEST['id'];

    $nuevoEje = $_POST['nuevoEje'];

    $stmt_edit = $mysqli->prepare("UPDATE clientes SET nEjecutivo = ? WHERE nCuenta = ?"); //preparamos
    $stmt_edit->bind_param("ss",$nuevoEje,$id); //ingresamos valores

    if (!$stmt_edit->execute()) { //ejecutamos
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            header("Location: admin_cl.php");
    }else{ 
        echo "<br/>"; echo "Ejecutivo reasignado correctamente."; 
    }
    
    header("Location: admin_cl.php");
?>