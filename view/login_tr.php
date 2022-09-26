<?php

    require "conexion.php";

    session_start();

    if($_POST){
        $cuenta = $_POST['nCuenta'];
        $password = $_POST['passw_user'];

        $sql = "SELECT * FROM trabajadores WHERE nCuenta = '$cuenta'";
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
                            La contraseña es incorrecta. Inténtalo de nuevo.
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-login" >
            <h1>Iniciar Sesión</h1>
            <div class="contenedor-inputs">
                <input type="text" name="nCuenta" placeholder="Número de cuenta" class="input-100" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
                <input type="password" name="passw_user" placeholder="Contraseña"class="input-100" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon2" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                </svg>
                <input type="submit" value="Iniciar" class="btn_login">
            </div>
        </form>
    </div>
</body>
</html>