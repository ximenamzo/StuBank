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
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>clientes</title>
</head>
<body>
    <?php
    //Lamamos a la base de datos para extraer datos de los clientes
    $conexion = mysqli_connect("localhost", "root", "", "stubank");
    $m="SELECT * FROM clientes WHERE nombre='$nombre'";
    $mostrar = $conexion->query($m); 
    $dato = $mostrar->fetch_array();

    ?>
    <a class="navbar-brand" href="index.php">
        <img src="src\StuBank.png" width="150px">
    </a>
    <div class="Header">
        <a class="inicio" href="index.php">Inicio</a>
        <a class="nombre">!Hola,<?php echo $nombre;?></a>
        <svg id="header"><rect></svg>
    </div>
    <div class="dinero-cliente">
        <a class="texto-dinero">Dinero disponible</a>
        <a class="dinero-dispo">$<?php echo $dato['saldo'];?></a>
        <svg id="dinero"><rect></svg>
        <svg id="dinero2"><rect></svg>
    </div>
    <div class="acciones">
        <a class="acct">Acciones</a>
        <a class="accd" href="">Deposito</a>
        <a class="accr"href="">Retiro</a>
        <a class="acctr"href="">Transferencia</a>
        <svg id="acr"><rect></svg>
        <svg id="acr2"><rect></svg>
    </div>
    <div class="historial">
        <a class="histotxt">Historial</a>
        <svg id="histo"><rect></svg>
        <svg id="histo2"><rect></svg>
        <svg id="histo3"><rect></svg>
    </div>

</body>
</html>