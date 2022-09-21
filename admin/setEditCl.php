<?php

session_start();

include('../view/conexion.php');

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];

if($rol != 1){
    header("Location: ../index.php");
}

$id = $_REQUEST['id'];

$nuevoEje = $_POST['nuevoEje'];

if (!$mysqli->query("UPDATE clientes SET nEjecutivo = '$nuevoEje' WHERE nCuenta = '$id'")) {

        echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        header("Location: admin_cl.php");
}else
{ 
    echo "<br/>"; echo "Registro agregado correctamente"; 
}
    header("Location: admin_cl.php");
?>