<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../src/css/styles-register.css">
    <link rel="stylesheet" href="../src/css/estilos.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function valideKey(evt){
            
        // code is the decimal ASCII representation of the pressed key.
        var code = (evt.which) ? evt.which : evt.keyCode;
            
        if(code==8){ // backspace.
            return true;
        }else if(code>=48 && code<=57){ // is a number.
            return true;
        }else{ // other keys.
            alert("Ingresar solo numeros");
            return false;
            }
        }

        function SoloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú .";
            especiales = [8,13,48,49,50,51,52,53,54,55,56,57];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            alert("Ingresar solo letras y numeros");
            return false;
        }
    }
    </script>

        <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>StuBank - Registro de Cliente</title>
</head>
<header>
    <?php include('../view/navbar.php'); ?>
</header>
<body>
    <div class="container">
        <img src="../src/registro.jpg" class="imagen">
        <form action="comprobar_cliente.php" method="post" class="form-registro" enctype="multipart/form-data">
            <h1>Registrar cliente</h1>
            <div class="contenedor-inputs">
                <input type="text" name="nCuenta" onkeypress="return SoloLetras(event);" placeholder="Número de cuenta" class="input-50" maxlength="8" required>
                <input type="text" name="name_user" onkeypress="return SoloLetras(event);" placeholder="Nombre" class="input-50" required>
                <input type="text" name="apellidoP" onkeypress="return SoloLetras(event);" placeholder="Apellido Paterno" class="input-50" required>
                <input type="text" name="apellidoM" onkeypress="return SoloLetras(event);" placeholder="Apellido Materno" class="input-50">
                <input type="tel" maxlength="10" name="telefono_user" onkeypress="return valideKey(event);" placeholder="Telefono" class="input-100" required>
                <input type="email" name="correo_user" class="input-100" placeholder="Email" required>
                <input type="text" maxlength="18" name="curp" class="input-100" placeholder="CURP" required>
                <label class="yearday">Fecha de nacimiento: </label>
                <input type="date" name="fecNac" class="input-50" required>
                <label class="yearday">Foto del cliente: </label><input type="file" name="foto" class="input-50" required accept="image/png, .jpeg, .jpg, image/gif">
                <input type="submit" value="Registrar" class="btn_enviar">
            </div>
        </form>
    </div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>