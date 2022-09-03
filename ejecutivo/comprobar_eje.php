<?php

	session_start();
	$cuenta = $_POST['nCuenta'];
	$correoR = $_POST['correo_user'];
	$curp = $_POST['curp'];

	include('../importante/conexion.php');

	$consutaRegistro = "SELECT * FROM trabajadores WHERE nCuenta='$cuenta' AND email='$correoR' AND curp='$curp'";

	$resultado = mysqli_query($mysqli,$consutaRegistro);
    $cont=0;
    
    while($consulta = mysqli_fetch_array($resultado)){
        $cont++;
    }

    if($cont==1){
    	$_SESSION['cuenta'] = $cuenta;
    	echo '<script language="javascript">alert("Datos correctos, defina su contraseña");window.location.href="asignar_pass.php"</script>';
    }else{
    	echo '<script language="javascript">alert("Datos incorrectos");window.location.href="/index.php"</script>';
    }
?>