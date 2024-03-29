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

    $obtencion3 = "SELECT * FROM cuentas where nCliente = '$cuenta' AND tipo = 'B'";
    $resultado3 = $mysqli->query($obtencion3);
    $cuentaCred = $resultado3->fetch_assoc();

    if(!empty($cuentaCred)){
        $cuentaPres = $cuentaCred['cuenta'];
        $obtencion = "SELECT * FROM prestamos WHERE solicitanteCl = '$cuentaPres' AND estatus = 2";
        $resultado = mysqli_query($mysqli,$obtencion);
        $prestamos = $resultado->fetch_all(MYSQLI_ASSOC);
    
        $obtencion2 = "SELECT * FROM prestamos WHERE solicitanteCl = '$cuentaPres'  AND estatus != 2";
        $resultado2 = mysqli_query($mysqli,$obtencion2);
        $prestamos2 = $resultado2->fetch_all(MYSQLI_ASSOC);
    }else{
        $cuentaCred = '';
        $prestamos = null;
        $prestamos2 = null;
    }

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
            <?php if($prestamos != null):?>
            <h3><b>Préstamo actual</b></h3>
            <table class="table mt-3">
                <thead>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Meses</th>
                    <th scope="col">Metodo</th>
                    <th scope="col">Fecha de solicitud</th>
                    <th scope="col">Restante</th>
                    <th scope="col">Pagar</th>
                    <th scope="col">Pagos</th>
                </thead>
                <tbody>
                    <?php foreach($prestamos as $prestamo): ?>
                        <tr>
                            <td><?=$prestamo['cantidad']?></td>
                            <td><?=$prestamo['meses']?></td>
                            <td><?=$metodo[$prestamo['metodo']]?></td>
                            <td><?=$prestamo['fecha']?></td>
                            <td><?=round($prestamo['deuda'],2)?></td>
                            <td><a href="formPagoPres.php?id=<?=$prestamo['id_prest']?>&deu=<?=$prestamo['deuda']?>" class="btn btn-success"><i class="bi bi-currency-dollar"></i></a></td>
                            <td><a href="pagos.php?id=<?=$prestamo['id_prest']?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php elseif($prestamos == null):?>
                <br>Ningun préstamo en curso, calcule un préstamo <a href="calc.php" >aquí</a>.<br>
                Para obtener un préstamo acude físicamente con tu ejecutivo asignado.
            <?php endif;?>
            <br>
            <?php if($prestamos2 != null):?>
            <h3><b>Historial</b></h3><hr>
            <table class="table mt-3">
                <thead>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Meses</th>
                    <th scope="col">Metodo</th>
                    <th scope="col">Fecha de solicitud</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Pagos</th>
                </thead>
                <tbody>
                    <?php foreach($prestamos2 as $prestamo2): ?>
                        <tr>
                            <td><?=$prestamo2['cantidad']?></td>
                            <td><?=$prestamo2['meses']?></td>
                            <td><?=$metodo[$prestamo2['metodo']]?></td>
                            <td><?=$prestamo2['fecha']?></td>
                            <td><?=$estados[$prestamo2['estatus']]?></td>
                            <td>
                                <?php if($prestamo2['estatus'] == 4): ?>
                                    <a href="pagos.php?id=<?=$prestamo2['id_prest']?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php elseif($prestamos == null):?>
                <!--Usted no ha solicitado ningun préstamo.-->
            <?php endif;?>
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