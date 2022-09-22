<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM trabajadores WHERE rol = '2' AND estatus = '1'";
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
        <div class="col-md-9">
            <a href="register.php" class="btn btn-success">Registrar ejecutivo nuevo</a><br>
            <table class="table mt-3">
                <thead>
                    <th scope="col">N. trabajador</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Opciones</th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="infoEje.php?id=<?php echo $ejecutivo['nCuenta'];?>" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                                    <a href="editEje.php?id=<?php echo $ejecutivo['nCuenta'];?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                    <a href="deleteEje.php?id=<?php echo $ejecutivo['nCuenta'];?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>