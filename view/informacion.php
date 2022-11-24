<?php 
    session_start();
    
    if(isset($_SESSION['nombre'])){
        $nombre = $_SESSION['nombre'];
        $rol = $_SESSION['rol'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="/src/js/scroll.js"></script>
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>

<header>
    <?php include('navbar.php'); ?>
</header>
<body>
    <div class="row info-cont">
        <div class="col-md-4 info-col">
            <div class="info-card">
                <h2>Cuentas</h2><br>
                <h6>
                    Al darte de alta como cliente de StuBank te damos por defecto una cuenta de débito. <br><br>
                    El banco te da la opción de abrir hasta 5 cuentas diferentes: Débito (principal y secundaria), Crédito, Ahorro y Cuenta en Dólares. <br>
                </h6><br>
                <h5>Débito</h5>
                <h6>
                    Depósitos | Retiros<br>
                    Transferencias a otras cuentas<br>
                    Pagos de servicios<br>
                    Recargas y paquetes a números telefónicos<br>
                </h6><br>
                <h5>Crédito</h5>
                <h6>
                    Depósitos | Préstamos <br>
                </h6><br>
                <h5>Ahorro</h5>
                <h6>
                    Depósitos | Retirar hasta el 10%<br>
                </h6><br>
                <h5>Dólares</h5>
                <h6>
                    Depósitos | Retiros<br>
                    Transferencias a otras cuentas
                </h6>
            </div>
        </div>
        <div class="col-md-4 info-col">
            <div class="info-card">
                <h2>Movimientos</h2><br>
                <h6>
                    Puedes manejar tu dinero con confianza. <br>
                    Mueve tu dinero más fácil que nunca. <br>
                </h6><br>

                <h5>Depóstios</h5>
                <h6>
                    Físicamente realizado con ayuda de tu ejecutivo desde las sucursales de StuBank. Hasta $19,000 MXN a tus cuentas por día. <br>
                </h6><br>

                <h5>Retiros</h5>
                <h6>
                    Movimiento desde las sucursales físicas de StuBank. Hasta $15,000 MXN desde tus cuentas por día. <br>
                </h6><br>

                <h5>Transferencias a otras cuentas</h5>
                <h6>
                    Movimientos propios de la aplicación web. Transferencias bancarias hechas a otras cuentas dentro de StuBank. Hasta $8,000 MXN por día. <br>
                </h6><br>

                <h5>Pagos de servicios</h5>
                <h6>
                    Movimientos propios de la aplicación para pagar serivicios somo Telmex, Telcel, CFE, Capdam, Izzi, entre otros.<br>
                </h6><br>

                <h5>Recargas y paquetes</h5>
                <h6>
                    Contratación de tiempo aire para Telcel, Movistar, Unefon y AT&T.<br>
                </h6>
            </div>
        </div>
        <div class="col-md-4 info-col">
            <div class="info-card">
                <h2>Préstamos</h2><br>
                <h6>
                    Disponibles a solicitud desde todas las cuentas de crédito. <br>
                </h6><br>

                <h5>Cálculo</h5>
                <h6>
                    Puedes calcular las tablas de amortización que necesites desde el panel de préstamos en tu página de cliente. <br>
                </h6><br>

                <h5>Solicitud</h5>
                <h6>
                    Para solicitar un préstamo dirígete con tu ejecutivo asignado para realizar una aplicación al departamento de préstamos del banco. <br>
                </h6><br>

                <h5>Aceptación</h5>
                <h6>
                    Tu solicitud tendrá respuestá en cuestión de minutos. <br>
                </h6><br>

                <h5>Recibo</h5>
                <h6>
                    Puedes recibir el monto del préstamo en efectivo o por medio de una transferencia a tu cuenta de crédito.<br>
                </h6><br>

                <h5>Pago</h5>
                <h6>
                    Abona a tus préstamos desde la aplicación web.<br>
                </h6>
            </div>
        </div>
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:0rem;">
    <?php include('footer.php'); ?>
</footer>
<script>
    function goto(url)
    {
    window.location=url;
    }
</script>
</html>