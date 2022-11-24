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

    $cl = $_REQUEST['cl'];

    $obtencion = "SELECT * FROM cuentas WHERE cuenta != '$cl' AND nCliente = '$cuenta'";
    $resultado = mysqli_query($mysqli, $obtencion);
    $cuentas = $resultado->fetch_all(MYSQLI_ASSOC);

    $tiposCuenta = ['', 'Débito', 'Crédito', 'Ahorro','Dólares', 'Débito (Secundaria)'];
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
        <div class="col-md-9" style="padding-left:2rem;">
            <h1>Destino de transferencia</h1><hr>
            <h5 style="margin-bottom:1rem;">Ingresa la cuenta a transferir:</h5>
            <form action="dest.php" method="POST" style="margin-bottom:2rem;">
                <div class="input-group mb-3" style="width:50%;">
                    <span class="input-group-text" id="basic-addon1">Cuenta de destino:</span>
                    <input type="text" class="form-control" placeholder="Ejemplo: 12345678A" name="destino" id="destino">
                    <input type="hidden" name="cl" value="<?=$cl?>">
                    <input class="btn btn-success" type="submit" value="Continuar...">
                </div>
            </form>

            <h5>O transfiere a una de tus cuentas:</h5>
            <?php foreach($cuentas as $cu):?>
                <div class="trans" style="width:25%;">
                    <div class="row" style="width: 100%;">
                        <div style="width: 80%;">
                            <h6><?=$cu['titulo']?></h6>
                            <!--Saldo disponible: $<?=$cu['saldo']?><br>-->
                        </div>
                        <div style="width: 20%;">
                            <a href="destSelf.php?id=<?=$cu['cuenta']?>&cl=<?=$cl?>" class="btn btn-primary btn-sm" type="submit"><i class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
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