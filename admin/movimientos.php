<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
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
        <?php include('menu.php');
            $obtencion = "SELECT * FROM transacciones";
            $resultado = mysqli_query($mysqli,$obtencion);
            //Variables para la paginación
            $MovimientosXpagina = 8;
            if ($stmt = $mysqli->prepare($obtencion)) {
                $stmt->execute();
                $stmt->store_result();
                $totalDatos = $stmt->num_rows;
            }
            $paginas = $totalDatos/$MovimientosXpagina;
            $paginas = ceil($paginas); //redondear paginas para que no haya perdida de datos
            //Condiciones de paginacion
            if (empty($_GET['pagina'])){
                $pagina = 1;
            }
            else{
                $pagina = $_GET['pagina'];
            }
            $CalculoIncio = ($pagina-1)*$MovimientosXpagina;
            $inicio = (string)$CalculoIncio;
            $sql = "SELECT * FROM transacciones LIMIT $inicio,$MovimientosXpagina";
            $obtencionD = mysqli_query($mysqli,$sql);
            $resultado_Datos=$obtencionD->fetch_all(MYSQLI_ASSOC);
        ?>
        <div class="col-md-9">
            <h2>Movimientos del banco</h2><hr>
            <table class="table mt-3">
                <thead>
                    <th scope="col">Tramitador</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de realización</th>
                </thead>
                <tbody>
                    <?php foreach($resultado_Datos as $movimiento): ?>
                        <tr>
                            <td><?=$movimiento['cTramitador'] ?></td>
                            <td><?=$movimiento['cOrigen'] ?></td>
                            <td><?=$movimiento['cDestino'] ?></td>
                            <td><?=$movimiento['tipo'] ?></td>
                            <td>$<?=$movimiento['cantidad'] ?></td>
                            <td><?=$movimiento['fecha'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php if($paginas == null){ ?>
                <br><br><h4>No hay movimientos recientes.</h4><br><br>
            <?php } ?>

            <nav aria-label="movimientoP">
                <ul class="pagination">
                    <li class="page-item
                        <?php echo $pagina<=1 ? 'disabled': '' ?>">
                        <a class="page-link"href="movimientos.php?pagina=<?php echo $pagina-1?>">Anterior</a>
                    </li>
                    <?php for($i=0;$i<$paginas;$i++):?>
                        <li class="page-item
                            <?php echo $pagina==$i+1 ? 'active': '' ?>">
                            <a class="page-link" href="movimientos.php?pagina=<?php echo ($i+1)?>"><?php echo ($i+1)?></a>
                        </li>
                    <?php endfor?>
                    <li class="page-item
                        <?php echo $pagina>=$paginas? 'disabled': '' ?>">
                        <a class="page-link" href="movimientos.php?pagina=<?php echo $pagina+1?>">Siguiente</a>
                    </li>
                </ul>
            </nav>

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