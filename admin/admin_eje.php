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

    $obtencion = "SELECT * FROM trabajadores WHERE rol = '2' AND estatus = '1'";
    $resultado = mysqli_query($mysqli,$obtencion);
    //$ejecutivos = $resultado->fetch_all(MYSQLI_ASSOC);
    //Variables para la paginación
    $TrabajadoresXpagina = 8;
    if ($stmt = $mysqli->prepare($obtencion)) {
        $stmt->execute();
        $stmt->store_result();
        $totalDatos = $stmt->num_rows;
    }
    $paginas = $totalDatos/$TrabajadoresXpagina;
    $paginas = ceil($paginas); //redondear paginas para que no haya perdida de datos
    //Condiciones de paginacion
    if (empty($_GET['pagina'])){
        $pagina = 1;
    }
    else{
        $pagina = $_GET['pagina'];
    }
    $CalculoIncio = ($pagina-1)*$TrabajadoresXpagina;
    $inicio = (string)$CalculoIncio;
    $sql = "SELECT * FROM trabajadores WHERE rol='2' AND estatus='1' LIMIT $inicio,$TrabajadoresXpagina";
    $obtencionD = mysqli_query($mysqli,$sql);
    $resultado_Datos=$obtencionD->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../src/js/funciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php');?>
        <div class="col-md-9">
            <h2>Ejecutivos de StuBank</h2><hr style="position: absolute; width:73%;">
            <div class="row mt-5" style="width: 100%;">
                <div class="input-group m-1" style="width: 30%;">
                    <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </span>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar..." class="form-control" style="width: 30%;">
                </div>

                <div class="m-1" style="width: 60%; margin-right: 5em;">
                    <a href="register.php" class="btn btn-success">Registrar ejecutivo nuevo</a><br>
                </div>
            </div>

            <table class="table mt-3" id="myTable">
                <thead>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ape paterno</th>
                    <th scope="col">Ape materno</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col"></th>
                </thead>
                <tbody id="myTbody">
                    <?php foreach($resultado_Datos as $ejecutivo): ?>
                        <tr>
                            <td><?=$ejecutivo['nCuenta'] ?></td>
                            <td><?=$ejecutivo['nombre'] ?></td>
                            <td><?=$ejecutivo['apellidoP'] ?></td>
                            <td><?=$ejecutivo['apellidoM'] ?></td>
                            <td><?=$ejecutivo['telefono'] ?></td>
                            <td><?=$ejecutivo['email'] ?></td>
                            <td>
                                <a href="opcEje.php?id=<?=$ejecutivo['nCuenta'];?>" class="btn btn-outline-primary"><i class="bi bi-tools"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php if($paginas == null){ ?>
                <br><br><h4>No hay ejecutivos registrados.</h4><br><br>
            <?php } ?>

            <nav aria-label="movimientoP">
                <ul class="pagination">
                    <li class="page-item
                        <?php echo $pagina<=1 ? 'disabled': '' ?>">
                        <a class="page-link"href="admin_eje.php?pagina=<?php echo $pagina-1?>">Anterior</a>
                    </li>
                    <?php for($i=0;$i<$paginas;$i++):?>
                        <li class="page-item
                            <?php echo $pagina==$i+1 ? 'active': '' ?>">
                            <a class="page-link" href="admin_eje.php?pagina=<?php echo ($i+1)?>"><?php echo ($i+1)?></a>
                        </li>
                    <?php endfor?>
                    <li class="page-item
                        <?php echo $pagina>=$paginas? 'disabled': '' ?>">
                        <a class="page-link" href="admin_eje.php?pagina=<?php echo $pagina+1?>">Siguiente</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTbody tr").filter(function() {
                    $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>