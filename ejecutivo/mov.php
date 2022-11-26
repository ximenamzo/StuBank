<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nEjecutivo = '$cuenta' AND estatus = 1";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../src/js/funciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTbody tr").filter(function() {
                    $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            <h3>Seleccione un cliente</h3><br>
            <!--<form action="selecMov.php" method="POST">
                <input type="text" name="nCuenta" placeholder="Número de cuenta">
                <input type="submit" value="Buscar" class="btn btn-primary">
            </form>-->
            
            <div class="input-group mb-3" style="width: 30%;">
                <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </span>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar..." class="form-control" style="width: 30%;">
            </div>
            
            <table class="table mt-3" id="myTable">
                <thead>
                    <th scope="col">N. cuenta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Seleccionar</th>
                </thead>
                <tbody id="myTbody">
                    <?php foreach($clientes as $cliente): ?>
                        <tr>
                            <td><?=$cliente['nCuenta'] ?></td>
                            <td><?=$cliente['nombre'] ?></td>
                            <td><?=$cliente['apellidoP'] ?></td>
                            <td><?=$cliente['apellidoM'] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <form action="selecCuenta.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$cliente['nCuenta'];?>">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-arrow-right-circle-fill"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:14rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>