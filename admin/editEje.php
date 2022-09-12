<?php
	$id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../importante/conexion.php');

    $obtencion = "SELECT * FROM trabajadores WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $ejecutivos = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <form action="setEdit.php?id=<?php echo $ejecutivo['nCuenta'];?>" method="post" enctype="multipart/form-data">
                	<img style="width: 10pc;" src="https://st.depositphotos.com/2398521/2643/i/600/depositphotos_26433069-stock-photo-smile-emotional-animal.jpg"><br>
                	<label>Nombre:</label>
                    <input type="text" name="nom" id="nom" value="<?=$ejecutivo['nombre']?>"><br>
                	<label>Apellido paterno:</label>
                    <input type="text" name="aP" id="aP" value="<?=$ejecutivo['apelldoP']?>"><br>
                    <label>Apellido materno:</label><input type="text" name="aM" id="aM" value="<?=$ejecutivo['apellidoM']?>"><br>
                	<label>Telefono:</label>
                    <input type="text" name="tel" id="tel" value="<?=$ejecutivo['telefono']?>"><br>
                	<label>Correo electronico:</label><input type="email" name="email" id="email" value="<?=$ejecutivo['email']?>"><br>
                	<label>CURP:</label>
                    <input type="text" name="curp" id="curp" value="<?=$ejecutivo['curp']?>"><br>
                	<label>Fecha de nacimiento:</label><input type="date" name="fNa" id="fNa" value="<?=$ejecutivo['fecNac']?>"><br>

                    <a href="admin_eje.php" class="btn btn-secondary">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Editar">
                </form>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>