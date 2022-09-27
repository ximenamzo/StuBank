<?php
    $destino = $_POST['destino'];

    require('../view/conexion.php');
    require('../view/captcha.php');

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    $captcha = new Captcha();

    if($captcha->checkCaptcha($_POST['h-captcha-response'])){
        $pass = $_POST['pass'];
        $salt = "invalid";
        $passFull = md5($salt.$pass);
        $cuenta = $_SESSION['cuenta'];

        $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$cuenta'";
        $resultado = mysqli_query($mysqli,$obtencion);
        $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

        foreach($clientes as $cliente):
            $passDB = $cliente['password'];
            $saldoOri = $cliente['saldo'];
        endforeach;

        if($passDB == $passFull){
            $dinero = $_POST['dinero'];

            $obtencion2 = "SELECT * FROM clientes WHERE nCuenta = '$destino'";
            $resultado2 = mysqli_query($mysqli,$obtencion2);
            $clientes2 = $resultado2->fetch_all(MYSQLI_ASSOC);


            foreach($clientes2 as $cliente2):
                $saldoDest = $cliente2['saldo'];
            endforeach;

            $newSaldoOri = $saldoOri - $dinero;
            $newSaldoDest = $saldoDest + $dinero;

            if(!$mysqli->query("INSERT INTO `transacciones` (`cTramitador`, `solicitante`, `cOrigen`, `cDestino`, `tipo`, `cantidad`) VALUES ('$cuenta', '$cuenta', '$cuenta', '$destino', 'Transferencia', '$dinero')")){
                echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            }else{
                if(!$mysqli->query("UPDATE clientes SET saldo = '$newSaldoOri' WHERE nCuenta = '$cuenta'")){
                    echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
                }else{
                    if(!$mysqli->query("UPDATE clientes SET saldo = '$newSaldoDest' WHERE nCuenta = '$destino'")){
                        echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
                    }
                }
            }
        }else{
            echo '<script language="javascript">alert("Contraseña incorrecta");window.location.href="movimientos.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Captcha incorrecto");window.location.href="movimientos.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../src/icono.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <title>StuBank</title>
</head>
<body class="text-center">
    <img src="../src/StuBank.png" class="mx-auto mb-3">
    <center><div class="border border-success w-50">
        <h1>Ficha de transferencia</h1>
        <p>Se realizó una transferencia de $<?=$dinero?> de la cuenta <?=$cuenta?> a la cuenta <?=$destino?></p>
        <p>El dia: <?=date('d-m-Y');?></p>
        <img src="../src/barcode.png" style="width: 13pc;"><br><br>

        <a href="movimientos.php" class="btn btn-secondary">Regresar</a>
        <button class="btn btn-success" onclick="imprimir()">Imprimir</button>
    </div></center>

    <script>
        function imprimir(){
            print();
        }
    </script>
</body>
</html>