<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 3){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');
    
    $meses= $_POST['meses']; //Total de meses/plazos
    $totalMeses = $meses;
    $p = 0.05; //Porcentaje de interes
    $prestamo= $_POST['dinero']; //Prestamo solicitado
    $totPago = 0;
    $totInt = 0;
    $totAmort = 0;
    $p_mes =round(($prestamo * $p)/(1-(pow((1+$p),-$meses))),2); //Pago por mes
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
    <script src="../src/js/funciones.js"></script>
    <title>StuBank</title>
</head>
<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            <div id="GFG"> <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
            <table class="table mt-3">
                <thead>
                    <th scope="col">Periodo</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Interés</th>
                    <th scope="col">Amortización</th>
                    <th scope="col">Pendiente</th>
                </thead>
                <tbody>
                    <tr> <!--Primer renglon-->
                        <td>0</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>$<?=$prestamo?></td>
                    </tr>
                    <?php for($i = 1; $i <= $totalMeses; $i++){ ?>
                        <tr>
                            <td><?=$i?></td> <!--Meses-->
                            <td>$<?php echo $p_mes; $totPago+=$p_mes;?></td> <!--Pago-->
                            <td>$<?php $intereses=round($prestamo * $p,2);echo $intereses; $totInt+=$intereses;?></td> <!--Interes-->
                            <td>$<?php $amortizacion= $p_mes - $intereses;echo $amortizacion; $totAmort+=$amortizacion;?></td> <!--Amort-->
                            <td>$<?php $prestamo= $prestamo - $amortizacion; if($prestamo>1){ echo $prestamo;}else{ echo "0";}?></td> <!--Saldo (Se redondea a 0 cuando los centavos no cuadran)-->
                        </tr>
                    <?php $meses--; }?>
                    <tr>
                        <td>Total</td>
                        <td>$<?=$totPago?></td>
                        <td>$<?=$totInt?></td>
                        <td>$<?=round($totAmort)?></td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table></div>
            
            <div style="color:#808080;"><p>*Si le interesa este u otros prestamos dirijase al banco con su ejecutivo asignado.</p></div>
            <div style="margin-bottom:5%;">
                <a href="calc.php" class="btn btn-primary">Calcular otro prestamo</a>
                <button class="btn btn-success" onclick="printDivStyle()">Obtener formato de impresión</button>
            </div>
        </div>

    </div>
</body>
</html>
