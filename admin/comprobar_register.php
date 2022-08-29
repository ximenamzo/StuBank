<?php

    $pass1 = $_POST['passw_user'];
    $pass2 = $_POST['passw_user2'];

    if($pass1 != $pass2){
        echo '<script language="javascript">alert("Las contraseñas deben coincidir");window.location.href="register.php"</script>';
    }

    $cuenta = $_POST['nCuenta'];
    $userR = $_POST['name_user'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correoR = $_POST['correo_user'];
    $telefonoR = $_POST['telefono_user'];
    $nacimiento = $_POST['fecNac'];
    $curp = $_POST['curp'];
    $salt = "invalid";
    $contraseñaful = md5($salt.$pass1);
    
    //llamamos a la conexion de base datos
    include('../importante\conexion.php');

    //Hacemos la consulta de nuestro codigo sql 
    $consutaRegistro = "SELECT * FROM trabajadores WHERE nCuenta='$cuenta'";
    
    //usamos el mysqli_query donde enviamos nuestra conexion y enviamos la consuta
    $resultado = mysqli_query($mysqli,$consutaRegistro);
    $cont=0;
    
    while($consulta = mysqli_fetch_array($resultado)){
        echo $consulta['nCuenta'];
        $cont++;
        echo $cont;
    }

    if($cont == 0){
        if (!$mysqli->query("INSERT INTO `trabajadores` (`nCuenta`,`nombre`,`apelldoP`, `apellidoM`, `telefono`,`fecNac`, `email`, `curp`, `password`) VALUES ('$cuenta','$userR', '$apellidoP', '$apellidoM', '$telefonoR','$nacimiento', '$correoR', '$curp', '$contraseñaful')")){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            echo '<script language="javascript">alert("Registro agregado correctamente");window.location.href="../index.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Ingresaste un usuario existente");window.location.href="../index.php"</script>';
    }
?>