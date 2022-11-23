<?php
	$id = $_REQUEST['id'];
    $cl = $_REQUEST['cl'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    if($id == $_SESSION['cuenta']){
        echo '<script language="javascript">alert("No se puede transferir a la misma cuenta");window.location.href="formDest.php"</script>';
    }

    $obtencion = "SELECT cl.nombre, cl.apellidoP, cl.apellidoM, cl.foto FROM cuentas as cu, clientes as cl WHERE cu.nCliente = cl.nCuenta AND cu.cuenta = '$id'";
    $resultado = $mysqli->query($obtencion);
    $cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
<link rel="stylesheet" href="../src/css/estilos.css">
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
        <div class="col-md-4">
            <h2>Cuenta de cliente...</h2>
            <div class="card">
            	<img style="display: block; margin: 5% auto 2% auto; height: 13pc;" src="../src/fotosCl/<?=$cliente['foto']?>"><br>
            	<div class="cont">
                    <label>Nombre:</label> <b><?=$cliente['nombre']." ".$cliente['apellidoP']." ".$cliente['apellidoM']?></b><br>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <form action="formTrans.php" method="POST">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="cl" value="<?=$cl?>">
                <button class="btn btn-success my-2" type="submit">Continuar</button><br>
                <a href="selectCuenta.php" class="btn btn-secondary mt-2">Regresar</a><br><br>
            </form>
        </div>
    </div>
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>