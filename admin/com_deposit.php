<?php

if (isset($_POST['solicitar_Deposito'])){
    include('../importante\conexion.php');
    $ncuenta= $_POST['nm_cuenta'];
    $cantidad= $_POST['cantidad'];
    $fecha= $_POST['fecha'];

    $query = "INSERT INTO depositos (nm_cuenta,fecha,cantidad) VALUES ('$ncuenta','$fecha','$cantidad')";
    $result= mysqli_query($mysqli, $query);

    if ($query){
        echo "<script> alert('datos almacenados de forma correcta');
        location.href = '';
        </script>";
    }else{
        echo "<script> alert('¡ERROR!');
        location.href = '';
        </script>";
    }

}
?>