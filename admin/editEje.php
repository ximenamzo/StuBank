<?php
	$id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

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
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-8">
            <h1>Editar ejecutivo</h1>

            <div class="card">
            <?php foreach($ejecutivos as $ejecutivo): ?>
                <div class="cont">
                <form action="setEdit.php?id=<?php echo $ejecutivo['nCuenta'];?>" method="post" enctype="multipart/form-data">
                	<br>
                    <div class="row" style="width: 100%;">
                        <div style="width: 30%;">
                            <img style="display: block; margin: 5% auto 2% auto; width: 13pc;" src="../src/fotos/<?=$ejecutivo['foto']?>"><br>
                        </div>

                        <div style="width: 70%; margin-top: 8%;">
                            <label class="form-label">Fotografía del ejecutivo:</label>
                            <input class="form-control" type="file" disabled><br>
                        </div>
                    </div>


                    <div style="width: 100%;" class="row">
                        <div style="width: 33%;">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?=$ejecutivo['nombre']?>"><br>
                        </div>

                        <div style="width: 33%;">
                            <label class="form-label">Apellido paterno:</label>
                            <input type="text" name="aP" id="aP" class="form-control" value="<?=$ejecutivo['apelldoP']?>"><br>
                        </div>
                        
                        <div style="width: 33%;">
                            <label class="form-label">Apellido materno:</label>
                            <input type="text" name="aM" id="aM" class="form-control" value="<?=$ejecutivo['apellidoM']?>"><br>
                        </div>
                    </div>
                	
                	
                    <div class="row">
                        <div style="width: 32%;">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" name="tel" id="tel" class="form-control" value="<?=$ejecutivo['telefono']?>"><br>
                        </div>

                        <div style="width: 64%;">
                            <label class="form-label">Correo electronico:</label>                        
                            <input type="email" name="email" id="email" class="form-control" value="<?=$ejecutivo['email']?>"><br>
                        </div>
                    </div>

                	
                    <div class="row">
                        <div style="width: 48%;">
                            <label class="form-label">CURP:</label>
                            <input type="text" name="curp" id="curp" class="form-control" value="<?=$ejecutivo['curp']?>"><br>
                        </div>

                        <div style="width: 48%;">
                            <label class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fNa" id="fNa" class="form-control" value="<?=$ejecutivo['fecNac']?>"><br>
                        </div>
                    </div>
                	

                    <a href="admin_eje.php" class="btn btn-secondary">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Editar">
                </form>
                </div><!-- cont -->
            <?php endforeach ?>
            </div> <!-- card -->
            <br><br>
        </div>
    </div>
</body>
</html>