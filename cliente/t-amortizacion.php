<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    include('../view/conexion.php');
    
    $consulta =  "SELECT * FROM prestamos WHERE nombreCliente = '$nombre'";
    $resultado = mysqli_query($mysqli,$consulta);
    $dato = $resultado->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- Datos para la tabla !-->
    <?php
    $totalMeses= $dato['meses'];//llamar a la base de datos los meses a pagar
    $p = 3; //porcentaje
    $prestamo= $dato['cantidad'];//Lammar a la base de datos el valor 
    $meses= $dato['meses']; 
    $iva = ($p * 100)/$prestamo; //valor de interes  
    $i=1;
    ?>
    <table class="table mt-3">
        <thead>
            <th scope="col">Plazo del mes</th>
            <th scope="col">Pago realizado</th>
            <th scope="col">Interes</th>
            <th scope="col">Amortizacion</th>
            <th scope="col">Saldo</th>
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>$<?php echo $prestamo?></td>
            </tr>
            <?php while ($i <= $totalMeses){ ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td>$<?php $p_mes = $prestamo * (($iva/$meses)/(1-pow(1+($iva/$meses),(-$meses)))); echo $p_mes;?></td>
                    <td>$<?php $intereses= $prestamo * ($iva/$meses);echo $intereses;?></td>
                    <td>$<?php $amortizacion= $p_mes - $intereses;echo $amortizacion;?></td>
                    <td>$<?php $n_saldo= $prestamo - $amortizacion; echo $n_saldo?></td>
                </tr>
            <?php 
                $i = $i+1;
                $meses = $meses -1;
                } ?>
        </tbody>
    </table>

</body>

</html>
