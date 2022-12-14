<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 3){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $id = $_REQUEST['id'];

    $obtencion = "SELECT * FROM pagos WHERE id_prest = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $pagos = $resultado->fetch_all(MYSQLI_ASSOC);

    $obtencion2 = "SELECT * FROM prestamos WHERE id_prest = '$id'";
    $resultado2 = $mysqli->query($obtencion2);
    $prestamo = $resultado2->fetch_assoc();

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
        <div class="col-md-5">
            <b>Prestamo de:</b> $<?=$prestamo['cantidad']?><br>
            <b>Solicitado el:</b> <?=$prestamo['fecha']?><br>
            <b>Estatus:</b> <?=$estados[$prestamo['estatus']]?><br>
            <b>Metodo:</b> <?=$metodo[$prestamo['metodo']]?><br>
            <b>Deuda restante:</b> $<?=round($prestamo['deuda'],2)?>


            <?php if($pagos != null):?>
                <table class="table mt-4">
                    <thead>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fecha de pago</th>
                    </thead>
                    <tbody>
                        <?php foreach($pagos as $pago):?>
                            <tr>
                                <td><?=$pago['cantidad']?></td>
                                <td><?=$pago['fecha']?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php else:?>
                <p class="mt-4">No se ha realizado ningun pago</p>
            <?php endif;?>
        </div>
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>