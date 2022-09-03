<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    include('../importante/conexion.php');

    $obtencion = "SELECT * FROM trabajadores WHERE rol = '2'";
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
        <div class="col-md-3" style="background-color: #8E1EDC;">
            <div class="mt-3 mb-3 mx-3" style="background-color: #ffffff;">
                <center><h3>Administrador</h3></center>
            </div>
            <div class="mt-3 mb-3 mx-3" style="background-color: #ffffff;">
                <a href="admin.php"><center>Movimientos</center></a>
            </div>
            <div class="mt-3 mb-3 mx-3" style="background-color: #ffffff;">
                <a href="admin_eje.php"><center>Ejecutivos</center></a>
            </div>
        </div>
        <div class="col-md-9">
            <a href="register.php">Registrar ejecutivo</a><br>
            <table class="table mt-3">
                <thead>
                    <th scope="col">N. trabajador</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo electronico</th>
                </thead>
                <tbody>
                    <?php foreach($ejecutivos as $ejecutivo): ?>
                        <tr>
                            <td><?=$ejecutivo['nCuenta'] ?></td>
                            <td><?=$ejecutivo['nombre'] ?></td>
                            <td><?=$ejecutivo['apelldoP'] ?></td>
                            <td><?=$ejecutivo['apellidoM'] ?></td>
                            <td><?=$ejecutivo['telefono'] ?></td>
                            <td><?=$ejecutivo['email'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>