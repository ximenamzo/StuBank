<?php
    $id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        header("Location: ../index.php");
    }

    include('../view/conexion.php');

    $obtencion = "SELECT * FROM cuentas WHERE cuenta = '$id'";
    $resultado = $mysqli->query($obtencion);
    $cuenta = $resultado->fetch_assoc();

    $tipo = $cuenta['tipo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-6">

            <div class="card" style="padding: 2rem;">
                <h2>Información para el depósito</h2><br>
                <form action="setDep.php" method="POST">

                    <div class="col-md-9" style="margin-top:1rem;">
                        <?php if($tipo == 4):?>
                            <label for="basic-url" class="form-label">Ingrese la cantidad de dinero a depositar y su divisa:</label>
                        <?php else:?>
                            <label for="basic-url" class="form-label">Ingrese la cantidad de dinero a depositar:</label>
                        <?php endif;?>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group mb-1">
                            <span class="input-group-text" style="width: 11%;">$</span>
                            <input type="number" name="dinero" class="form-control" style="width: 20%;" placeholder="0.00" min="0" max="15000" step="0.01" required>
                            <?php if($tipo == 4):?>
                                <select name="divisa" class="input-group-text" style="width: 33%;">
                                    <option value="1" selected>MXN</option>
                                    <option value="2">USD</option>
                                </select>
                            <?php else:?>
                                <span class="input-group-text" style="width: 25%;">MXN</span>
                            <?php endif;?>
                        </div><br>
                    </div>

                    <div class="col-md-7">
                        <label for="basic-url" class="form-label">Ingresa la contraseña:</label>
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

                    <br>
                    <div class="mt-3 mx-auto">
                        <div class="h-captcha" data-sitekey="d86ad688-fbcc-45d7-8cb4-ec8e394cdd80"></div>
                    </div><br>
                    
                    <input type="hidden" name="idCl" value="<?=$id?>">

                    <div style="width: 100%; display: flex; justify-content: center;">
                        <div style="text-align: center;">
                            <input type="submit" value="Generar depósito" class="btn btn-success">
                        </div>
                    </div>

                </form>
            </div> <!-- card -->

        </div><!-- col-md-5 -->
    </div>
</body>
</html>