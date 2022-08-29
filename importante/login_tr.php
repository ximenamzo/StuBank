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
                $_SESSION['rol'] = $row['rol'];

                header("Location: /index.php");
            }else{
                echo "La contraseña es incorrecta";
            }
        }else{
            echo "Datos incorrectos";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label>Numero de cuenta:</label>
        <input type="text" name="nCuenta" required>

        <label>Contraseña:</label>
        <input type="password" name="passw_user" required>

        <center><input type="submit" value="Iniciar"></center>
    </form>
</body>
</html>