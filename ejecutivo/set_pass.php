<?php
	session_start();

	$con = $_SESSION['pass'];

	include('../view/conexion.php');

	$cuenta = $_SESSION['cuenta'];
	$pass1 = $_POST['passw_user'];
    $pass2 = $_POST['passw_user2'];

    if($pass1 != $pass2){
        echo '<script language="javascript">alert("Las contraseñas deben coincidir");window.location.href="asignar_pass.php"</script>';
    }else{
    	$salt = "invalid";
    	$contraseñaful = md5($salt.$pass1);

    	if(!$mysqli->query("UPDATE `trabajadores` SET `password` = '$contraseñaful' WHERE `trabajadores`.`nCuenta`='$cuenta'")){
    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
    	}else{
    		session_destroy();
    		echo '<script language="javascript">alert("Contraseña creada correctamente");window.location.href="/index.php"</script>';
    	}

    	
    }
?>