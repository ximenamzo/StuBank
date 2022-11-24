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
        <div class="col-md-5">
            <p>*Los prestamos tienen un interés mensual del 5%</p>

            <div class="card">
                <div class="cont">
                    <form action="amortizacion.php" method="POST"></br>
                        <div class="row">
                            <div style="width:50%;"><label class="form-label" for="dinero">Monto del crédito: </label></div>
                            <div style="width:50%;"><label class="form-label" for="meses">Plazo en meses:</label></div>
                        </div>

                        <div class="row">
                            <div style="width:50%;"><input type="number" name="dinero" class="form-control" id="dinero" placeholder="0.00" min="0" step="0.01" required></div>
                            <div style="width:50%;"><input type="number" name="meses" class="form-control" id="meses" placeholder="#" required></div>
                        </div><br>
                        
                        <input type="submit" value="Calcular" class="btn btn-primary">
                    </form>
                </div><!--cont-->
            </div><!--card-->

        </div><!--col md 9-->
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>
