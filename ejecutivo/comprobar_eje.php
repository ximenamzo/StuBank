<?php

	session_start();
	$cuenta = $_POST['nCuenta'];
	$correoR = $_POST['correo_user'];
	$curp = $_POST['curp'];

	include('../view/conexion.php');

	$consutaRegistro = "SELECT * FROM trabajadores WHERE nCuenta='$cuenta' AND email='$correoR' AND curp='$curp'";

	$resultado = mysqli_query($mysqli,$consutaRegistro);
	$res = $mysqli->query($consutaRegistro);
	$row = $res->fetch_assoc();
	$pass_bd = $row['password'];
    $cont=0;
    
    while($consulta = mysqli_fetch_array($resultado)){
        $cont++;
    }

	$con = $row['password'];
	
    if($con != null){
		echo '<script language="javascript">alert("Usuario ya registrado. Inicie Sesión.");window.location.href="../view/login_tr.php"</script>';
	}

    if($cont==1){
    	$_SESSION['cuenta'] = $cuenta;
    	echo '<script language="javascript">alert("Datos correctos, defina su contraseña.");window.location.href="asignar_pass.php"</script>';
    }else{
    	echo '<script language="javascript">alert("Datos incorrectos.");window.location.href="register_eje.php"</script>';
    }
?>