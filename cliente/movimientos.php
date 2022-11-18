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
    <div class="row">
        <?php include('menu.php');
        $obtencion = "SELECT * FROM transacciones WHERE solicitante='$cuenta' OR cTramitador='$cuenta' ORDER BY fecha DESC"; //ORDER BY descendiente, muestra lo más reciente
        $resultado = mysqli_query($mysqli,$obtencion);
        //Variables para la paginación
        $MovimientosXpagina = 8; // El total de movimientos por paginacion
        if ($stmt = $mysqli->prepare($obtencion)) {
            $stmt->execute();
            $stmt->store_result();
            $totalDatos = $stmt->num_rows;
        }
        $paginas = $totalDatos/$MovimientosXpagina;
        $paginas = ceil($paginas);
        //Condiciones de paginacion
        if (empty($_GET['pagina'])){
            $pagina = 1;
        }
        else{
            $pagina = $_GET['pagina'];
        }
        $CalculoIncio = ($pagina-1)*$MovimientosXpagina;
        $inicio = (string)$CalculoIncio;
        $sql = "SELECT * FROM transacciones WHERE solicitante='$cuenta' OR cTramitador='$cuenta' ORDER BY fecha DESC LIMIT $inicio,$MovimientosXpagina"; //ORDER BY descendiente
        $obtencionD = mysqli_query($mysqli,$sql);
        $resultado_Datos=$obtencionD->fetch_all(MYSQLI_ASSOC);
        ?>
        <div class="col-md-9">
            <h2>Historial de movimientos</h2><hr>
            <table class="table mt-3">
                <thead>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de realización</th>
                </thead>
                <tbody>
                    <?php foreach($resultado_Datos as $movimiento): ?>
                        <tr>
                            <td><?=$movimiento['cOrigen'] ?></td>
                            <td><?=$movimiento['cDestino'] ?></td>
                            <td><?=$movimiento['tipo'] ?></td>
                            <td>$<?=$movimiento['cantidad'] ?></td>
                            <td><?=$movimiento['fecha'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php if($paginas == NULL){?>
                <br><br><h3>No cuenta con movimientos.</h3><br><br>
            <?php } ?>

            <div class="row">
                <div class="col-md-5">
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
                                <a class="page-link"href="movimientos.php?pagina=<?php echo $pagina+1?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-3">
                    <a href="selectCuenta.php" class="btn btn-success">Transferir a cuenta &nbsp;&nbsp;<i class="bi bi-plus-circle-fill"></i></a><br>
                </div>
                <div class="col-md-3">
                    <a href="seCuPa.php" class="btn btn-dark">Pagar servicio &nbsp;&nbsp;<i class="bi bi-cash-coin"></i></a><br>
                </div>
            </div>

        </div>
    </div>
</body>
</html>