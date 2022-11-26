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
        var code = (evt.which) ? evt.which : evt.keyCode; // code es la representación del decimal ASCII de la tecla presionada
            
        if(code==8){ // retroceso
            return true;
        }else if(code>=48 && code<=57){ // número
            return true;
        }else{ // otras teclas
            alert("Ingresar solo numeros");
            return false;
            }
        }

        function SoloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
            especiales = [8,13,48,49,50,51,52,53,54,55,56,57];
            tecla_especial = false
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
    <title>StuBank</title>
</head>
<body>
    <div class="container">
        <div class="imagen">
            <img src="../src/registro.jpg" class="imgr">
        </div>    
        <form action="comprobar_cl.php" method="post" class="form-login">
            <h1>Registrar</h1>
            <div class="contenedor-inputs">
                <input type="text" name="nCuenta" placeholder="Número de cuenta" class="input-100" maxlength="8" required>
                <input type="email" name="correo_user" placeholder="Correo"class="input-100" required>
                <input type="text" name="curp" maxlength="18" placeholder="CURP"class="input-100" required>
                <input type="submit" value="Registrarse" class="btn_login">
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