<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../importante/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE estatus = '1'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
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
        <div class="col-md-12">
            <table class="table mt-3">
                <thead>
                    <th scope="col">N. de cuenta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Opciones</th>
                </thead>
                <tbody>
                    <?php foreach($clientes as $cliente): ?>
                        <tr>
                            <td><?=$cliente['nCuenta'] ?></td>
                            <td><?=$cliente['nombre'] ?></td>
                            <td><?=$cliente['apellidoP'] ?></td>
                            <td><?=$cliente['apellidoM'] ?></td>
                            <td><?=$cliente['telefono'] ?></td>
                            <td><?=$cliente['email'] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="editCl.php?id=<?php echo $cliente['nCuenta'];?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="infoCl.php?id=<?php echo $cliente['nCuenta'];?>" class="btn btn-primary"><i class="bi bi-info-circle"></i></a>
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