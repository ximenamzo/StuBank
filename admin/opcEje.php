<?php
	$id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

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
            <h1>Ficha del ejecutivo</h1>

            <div class="card">
                <?php foreach($ejecutivos as $ejecutivo): ?>
                    <img style="display: block; margin: 5% auto 2% auto;" width="50%" src="../src/fotos/<?=$ejecutivo['foto']?>"><br>
                    <div class="cont">
                        <label>Número de trabajador:</label> <b><?=$ejecutivo['nCuenta']?></b><br>
                        <label>Nombre:</label> <b><?=$ejecutivo['nombre']." ".$ejecutivo['apellidoP']." ".$ejecutivo['apellidoM']?></b><br>
                        <label>Edad:</label> <b><?=edad($ejecutivo['fecNac'])?> años</b><br>
                        <label>Teléfono:</label> <b><?=$ejecutivo['telefono']?></b><br>
                        <label>Correo electrónico:</label> <b><?=$ejecutivo['email']?></b><br>
                        <label>CURP:</label> <b><?=$ejecutivo['curp']?></b><br>
                        <label>Activo desde el:</label> <b><?=$ejecutivo['fecInscrip']?></b><br>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <a href="editEje.php?id=<?=$ejecutivo['nCuenta']?>" class="btn btn-primary mt-5">Editar</a><br>
            <a href="deleteEje.php?id=<?=$ejecutivo['nCuenta']?>" onclick="return conf(event)" class="btn btn-danger mt-2">Borrar</a><br>
            <a href="admin_eje.php" class="btn btn-secondary mt-2">Regresar</a>
        </div>
    </div>
    <script language="javascript">
        const conf = _ => confirm("¿Desea eliminar a este ejecutivo?");
    </script>
</body>
</html>