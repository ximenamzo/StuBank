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

    $obtencion = "SELECT * FROM prestamos WHERE solicitanteEje = '$cuenta'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $prestamos = $resultado->fetch_all(MYSQLI_ASSOC);

    $estados = ['', 'Pendiente', 'En curso', 'Rechazado','Pagado'];
    $metodo = ['', 'Efectivo', 'Transferencia'];
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
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>

<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            <a href="selecPres.php" class="btn btn-success">Solicitar préstamo <i class="bi bi-hand-index-thumb"></i></a><br>
            <table class="table mt-3">
                <thead>
                    <th scope="col">Cuenta Solicitante</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Meses</th>
                    <th scope="col">Metodo</th>
                    <th scope="col">Fecha de solicitud</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Ficha</th>
                </thead>
                <tbody>
                    <?php foreach($prestamos as $prestamo): ?>
                        <tr>
                            <td><?=$prestamo['solicitanteCl']?></td>
                            <td>$<?=$prestamo['cantidad']?></td>
                            <td><?=$prestamo['meses']?></td>
                            <td><?=$metodo[$prestamo['metodo']]?></td>
                            <td><?=$prestamo['fecha']?></td>
                            <td><?=$estados[$prestamo['estatus']]?></td>
                            <?php if(($prestamo['metodo'] == 1) && ($prestamo['estatus'] == 2)):?>
                                <td><a href="fichaPres.php?id=<?=$prestamo['id_prest']?>" class="btn btn-success"><i class="bi bi-file-text"></i></a></td>
                            <?php endif?>
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
<footer style="margin-top:16rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>
