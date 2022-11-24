<?php

    require "conexion.php";

    session_start();

    if($_POST){
        $cuenta = $_POST['nCuenta'];
        $password = $_POST['passw_user'];

        $sql = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        if($num > 0){
            $salt = "invalid";
            $row = $resultado->fetch_assoc();
            $pass_bd = $row['password'];

            $passFull = md5($salt.$password);

            if($pass_bd == $passFull){
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['cuenta'] = $row['nCuenta'];
                $_SESSION['rol'] = $row['rol'];

                header("Location: /index.php");
            }else{
                echo "
                    <head>
                        <link rel='icon' type='image/png' href='../src/icono.png'>
                    </head>
                    <br>
                    <div style='width: 100%; display: flex; justify-content: center;'>
                        <div style='
                            color:grey; 
                            text-align:center; 
                            border:1.5px solid red;
                            border-radius: 1em 1em 1em 1em;
                            width: 35%;'>
                            Usuario o contraseña incorrectos. Inténtelo de nuevo.
                        </div>
                    </div>";
            }
        }else{
            echo "
                <head>
                    <link rel='icon' type='image/png' href='../src/icono.png'>
                </head>
                <br>
                <div style='width: 100%; display: flex; justify-content: center;'>
                    <div style='
                        color:grey; 
                        text-align:center; 
                        border:1.5px solid red;
                        border-radius: 1em 1em 1em 1em;
                        width: 35%;'>
                        La cuenta no existe o los datos son incorrectos.
                    </div>
                </div>";
        }
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

    <title>StuBank</title>
</head>
<body>
    <div class="container">
        <div class="imagen">
            <img src="../src/login.jpg" class="imgr">
        </div>    
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-login">
            <h1>Iniciar Sesión</h1>
            <div class="contenedor-inputs">
                <input type="text" name="nCuenta" placeholder="Número de cuenta" class="input-100" maxlength="8" required>
                <input type="password" name="passw_user" placeholder="Contraseña"class="input-100" required>
                <input type="submit" value="Entrar" class="btn_login">
            </div>
        </form>
    </div>
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>