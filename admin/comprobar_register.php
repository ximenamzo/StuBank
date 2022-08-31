<?php

    $cuenta = $_POST['nCuenta'];
    $userR = $_POST['name_user'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correoR = $_POST['correo_user'];
    $telefonoR = $_POST['telefono_user'];
    $nacimiento = $_POST['fecNac'];
    $curp = $_POST['curp'];

    //llamamos a la conexion de base datos
    include('../importante/conexion.php');

    //Hacemos la consulta de nuestro codigo sql 
    $consutaRegistro = "SELECT nCuenta FROM trabajadores WHERE nCuenta='$cuenta'";
    
    //usamos el mysqli_query donde enviamos nuestra conexion y enviamos la consuta
    $resultado = mysqli_query($mysqli,$consutaRegistro);
    $cont=0;
    
    while($consulta = mysqli_fetch_array($resultado)){
        echo $consulta['nCuenta'];
        $cont++;
        echo $cont;
    }

    if($cont == 0){
        if (!$mysqli->query("INSERT INTO `trabajadores` (`nCuenta`,`nombre`,`apelldoP`, `apellidoM`, `telefono`,`fecNac`, `email`, `curp`) VALUES ('$cuenta','$userR', '$apellidoP', '$apellidoM', '$telefonoR','$nacimiento', '$correoR', '$curp')")){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            echo '<script language="javascript">alert("Registro agregado correctamente");window.location.href="admin_eje.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Ingresaste un usuario existente");window.location.href="admin_eje.php"</script>';
    }
?>