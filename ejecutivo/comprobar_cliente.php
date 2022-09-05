<?php
    session_start();

    $cuenta = $_POST['nCuenta'];
    $cuentaEje = $_SESSION['cuenta'];
    $userR = $_POST['name_user'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correoR = $_POST['correo_user'];
    $telefonoR = $_POST['telefono_user'];
    $nacimiento = $_POST['fecNac'];
    $curp = $_POST['curp'];
    $fecha = date('Y-m-d');

    //llamamos a la conexion de base datos
    include('../importante/conexion.php');

    //Hacemos la consulta de nuestro codigo sql 
    $consutaRegistro = "SELECT nCuenta FROM clientes WHERE nCuenta='$cuenta'";
    
    //usamos el mysqli_query donde enviamos nuestra conexion y enviamos la consuta
    $resultado = mysqli_query($mysqli,$consutaRegistro);
    $cont=0;
    
    while($consulta = mysqli_fetch_array($resultado)){
        echo $consulta['nCuenta'];
        $cont++;
        echo $cont;
    }

    if($cont == 0){
        if (!$mysqli->query("INSERT INTO `clientes` (`nCuenta`, `nEjecutivo`,`nombre`,`apellidoP`, `apellidoM`, `telefono`,`fecNac`, `email`, `curp`, `fecInscrip`) VALUES ('$cuenta', '$cuentaEje','$userR', '$apellidoP', '$apellidoM', '$telefonoR','$nacimiento', '$correoR', '$curp', '$fecha')")){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            echo '<script language="javascript">alert("Registro agregado correctamente");window.location.href="ejecutivo.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Ingresaste un usuario existente");window.location.href="ejecutivo.php"</script>';
    }
?>