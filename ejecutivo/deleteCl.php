<?php
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

	$idCl = $_REQUEST['id'];

    $stmt_borrar = $mysqli->prepare("UPDATE clientes SET estatus = ? WHERE nCuenta = ?");
    $stmt_borrar->bind_param("is",$est,$idCl);
    $est=2;

	//$borrar = mysqli_query($mysqli, "UPDATE clientes SET estatus = '2' WHERE nCuenta = '$idCl'");
    
	if($stmt_borrar->execute()){
		header("Location: ejecutivo.php");
	}else{
		echo "Error";
		echo $idCl;
	}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-5">
            <h1>Ficha del cliente</h1>

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
        <div class="col-md-4">
            <br>
            <form method="post" action="" onsubmit="return conf(event)" class="mt-5">
                <input type="hidden" name="idCl" value="<?=$cliente['nCuenta']?>">
                <button type="submit" class="btn btn-danger">
                    Eliminar
                </button><br>
                <a href="clientes.php" class="btn btn-secondary mt-2">Regresar</a>
            </form>
        </div>
    </div>
    <script language="javascript">
        const conf = _ => confirm("¿Desea eliminar a este cliente?");
    </script>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>