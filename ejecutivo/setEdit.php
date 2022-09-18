<?php

session_start();

include('../importante/conexion.php');

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];

$id = $_REQUEST['id'];

$nom = $_POST['nom'];
$aP = $_POST['aP'];
$aM = $_POST['aM'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$curp = $_POST['curp'];
$fecha = $_POST['fNa'];

if (!$mysqli->query("UPDATE clientes SET nombre = '$nom', apelldoP = '$aP', apellidoM = '$aM', telefono = '$tel', email = '$email', curp = '$curp', fecNac = '$fecha' WHERE nCuenta = '$id'")) {

        echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        header("Location: ejecutivo.php");
}else
{ 
    echo "<br/>"; echo "Registro agregado correctamente"; 
}
    header("Location: ejecutivo.php");


?>