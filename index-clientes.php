<?php 
    session_start();
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>
<header>
    <?php include('view/navbar.php'); ?>
</header>
<body>
    <?php
    //Lamamos a la base de datos para extraer datos de los clientes
    include('view/conexion.php');
    $consulta = "SELECT * FROM clientes,prestamos WHERE nombre='$nombre'";
    $resultado = mysqli_query($mysqli,$consulta);
    $dato = $resultado->fetch_array();
    //sacar dinero total disponible//
    $dinero= $dato['saldo'];
    $prestamo = $dato['cantidad'];
    $dineroTotal = $dinero + $prestamo;
    ?>
    <div class="dinero-cliente">
        <a class="texto-dinero" href="cliente/t-amortizacion.php">Dinero disponible</a>
        <p class="dinero-dispo">$<?php echo $dineroTotal?></p>
        <svg id="dinero"><rect></svg>
        <svg id="dinero2"><rect></svg>
    </div>
    <div class="acciones">
        <p class="acct">Acciones</p>
        <a class="accd" href="cliente/prestamos.php">Prestamos</a>
        <a class="accr"href="">Retiro</a>
        <a class="acctr"href="">Transferencia</a>
        <svg id="acr"><rect></svg>
        <svg id="acr2"><rect></svg>
    </div>
    <div class="historial">
        <p class="histotxt">Historial</p>
        <svg id="histo"><rect></svg>
        <svg id="histo2"><rect></svg>
        <svg id="histo3"><rect></svg>
    </div>

</body>
</html>