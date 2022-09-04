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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Stubank</title>
</head>
<header>
    <?php include('navbar.php'); ?>
</header>
<body>
    <?php
    //Lamamos a la base de datos para extraer datos de los clientes
    $conexion = mysqli_connect("localhost", "root", "", "stubank");
    $m="SELECT * FROM clientes WHERE nombre='$nombre'";
    $mostrar = $conexion->query($m); 
    $dato = $mostrar->fetch_array();

    ?>
    <div class="dinero-cliente">
        <p class="texto-dinero">Dinero disponible</p>
        <a class="dinero-dispo">$<?php echo $dato['saldo'];?></a>
        <svg id="dinero"><rect></svg>
        <svg id="dinero2"><rect></svg>
    </div>
    <div class="acciones">
        <p class="acct">Acciones</p>
        <a class="accd" href="acciones/deposito.php">Deposito</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="src/sweetAlert.js"></script>
</html>