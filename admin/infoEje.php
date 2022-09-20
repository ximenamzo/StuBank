<?php
	$id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../importante/conexion.php');

    $obtencion = "SELECT * FROM trabajadores WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $ejecutivos = $resultado->fetch_all(MYSQLI_ASSOC);

    function edad($fecha_nacimiento){
	    $nacimiento = new DateTime($fecha_nacimiento);
	    $ahora = new DateTime(date("Y-m-d"));
	    $diferencia = $ahora->diff($nacimiento);
	    return $diferencia->format("%y");
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../importante/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            <h1>Ficha del trabajador</h1>
            <?php foreach($ejecutivos as $ejecutivo): ?>
            	<img style="width: 10pc;" src="../src/fotos/<?=$ejecutivo['foto']?>"><br>
            	<label>Numero de trabajador:</label> <?=$ejecutivo['nCuenta']?><br>
            	<label>Nombre:</label> <?=$ejecutivo['nombre']." ".$ejecutivo['apelldoP']." ".$ejecutivo['apellidoM']?><br>
            	<label>Edad:</label> <?=edad($ejecutivo['fecNac'])?><br>
            	<label>Telefono:</label> <?=$ejecutivo['telefono']?><br>
            	<label>Correo electronico:</label> <?=$ejecutivo['email']?><br>
            	<label>CURP:</label> <?=$ejecutivo['curp']?><br>
            	<label>Activo desde el:</label> <?=$ejecutivo['fecInscrip']?><br>
            <?php endforeach ?>

            <a href="admin_eje.php" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</body>
</html>