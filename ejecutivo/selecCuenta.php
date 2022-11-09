<?php
	$id = $_POST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

    function edad($fecha_nacimiento){
	    $nacimiento = new DateTime($fecha_nacimiento);
	    $ahora = new DateTime(date("Y-m-d"));
	    $diferencia = $ahora->diff($nacimiento);
	    return $diferencia->format("%y");
	}

    $obtencion2= "SELECT * FROM cuentas WHERE nCliente = '$id'";
    $resultado2 = mysqli_query($mysqli,$obtencion2);
    $cuentas = $resultado2->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Debito', 'Credito', 'Ahorro','Dolares'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-5">
            <h2>Cliente: </h2>

            <div class="card">
                <?php foreach($clientes as $cliente): ?>
            	<img style="display: block; margin: 5% auto 2% auto; height: 13pc;" src="../src/fotosCl/<?=$cliente['foto']?>"><br>
            	<div class="cont">
                    <label>Número de cliente:</label> <b><?=$cliente['nCuenta']?></b><br>
                    <label>Nombre:</label> <b><?=$cliente['nombre']." ".$cliente['apellidoP']." ".$cliente['apellidoM']?></b><br>
                    <label>Edad:</label> <b><?=edad($cliente['fecNac'])?></b><br>
                    <label>Teléfono:</label> <b><?=$cliente['telefono']?></b><br>
                    <label>Correo electronico:</label> <b><?=$cliente['email']?></b><br>
                    <label>CURP:</label> <b><?=$cliente['curp']?></b><br>
                    <label>Activo desde el:</label> <b><?=$cliente['fecInscrip']?></b><br>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <h2>Cuentas: </h2>
            <?php foreach($cuentas as $cuenta):?>
                <div class="border border-dark mt-1 mb-2">
                    <h4><?=$tiposCuenta[$cuenta['tipo']]?></h4>
                    <a href="deposito.php?id=<?=$cuenta['cuenta'];?>" class="btn btn-success">Depósito</a>
                    <a href="retiro.php?id=<?=$cuenta['cuenta'];?>" class="btn btn-danger">Retiro</a><br><br>
                </div>
            <?php endforeach;?>
            <a href="mov.php" class="btn btn-secondary mb-2">Regresar</a>
        </div>
    </div>
</body>
</html>