<?php 
    $id = $_POST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $cuenta = $_SESSION['cuenta'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM cuentas WHERE nCliente = '$id' AND tipo = 'B'";
    $resultado = $mysqli->query($obtencion);
    $cuentaCred = $resultado->fetch_assoc();

    if($resultado->num_rows > 0){
        $destino = $cuentaCred['cuenta'];
        $flagCred = 1;
    }else{
        $flagCred = 0;
    }
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
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>

<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-6">
            *NOTA: Los prestamos tienen una tasa de interés del 5%.

            <div class="card" style="padding: 2rem; margin-top: 1rem;">
                <?php if($flagCred == 1):?>  <!--////////////////////////////////////////-->
                    <form action="amort.php" method="POST">                  
                        <div class="row">
                            <div class="col-md-5" style="margin-bottom:1rem;">
                                <label for="basic-url" class="form-label">Valor del préstamo: </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text" style="width: 15%;">$</span>
                                    <input type="number" name="dinero" class="form-control" style="width: 20%;" placeholder="0.00" min="0" step="0.01" required>
                                    <span class="input-group-text" style="width: 30%;">MXN</span>
                                </div>
                            </div>

                            <div class="col-md-5" style="margin-left:2rem;">
                                <label for="basic-url" class="form-label">Plazo en meses: </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                    </span>
                                    <input type="number" name="meses" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-5">
                                <label class="form-label">Método de recibimiento: </label>
                                <select name="metodo" class="form-select">
                                    <option value="0" selected disabled>Seleccione uno</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                </select>
                            </div>

                            <div class="col-md-6" style="margin-left:2rem;">
                                <label for="basic-url" class="form-label">Contraseña:</label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                    </span>
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="destino" value="<?=$destino?>">
                        <div class="mt-4 mb-3">
                            <div class="h-captcha" data-sitekey="d86ad688-fbcc-45d7-8cb4-ec8e394cdd80"></div>
                        </div>

                        <input type="submit" value="Calcular tabla de amortización" class="btn btn-success">
                    </form>
                    
                <?php else:?> <!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="row">
                        <div class="col-md-5" style="margin-bottom:1rem;">
                            <label for="basic-url" class="form-label">Valor del préstamo: </label>
                            <div class="input-group mb-1">
                                <span class="input-group-text" style="width: 15%;">$</span>
                                <input type="number" name="dinero" class="form-control" style="width: 20%;" placeholder="0.00" min="0" step="0.01" disabled>
                                <span class="input-group-text" style="width: 30%;">MXN</span>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-left:2rem;">
                            <label for="basic-url" class="form-label">Plazo en meses: </label>
                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                </span>
                                <input type="number" name="meses" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Método de recibimiento: </label>
                            <select name="metodo" class="form-select" disabled>
                                <option value="0" selected disabled>Seleccione uno</option>
                            </select>
                        </div>

                        <div class="col-md-6" style="margin-left:2rem;">
                            <label for="basic-url" class="form-label">Contraseña:</label>
                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </span>
                                <input type="password" name="pass" class="form-control" placeholder="Contraseña" disabled>
                            </div>
                        </div>
                    </div>
                    
                    <label for="basic-url" class="form-label mt-3">Este cliente aún no tiene cuenta de crédito, tramitalá <a href="cuentasCl.php?id=<?=$id?>">aquí</a></label>
                <?php endif; ?>
            </div>
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
