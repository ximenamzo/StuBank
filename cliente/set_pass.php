<?php
	session_start();

	$con = $_SESSION['pass'];

	include('../importante/conexion.php');

	$cuenta = $_SESSION['cuenta'];
	$pass1 = $_POST['passw_user'];
    $pass2 = $_POST['passw_user2'];

    if($pass1 != $pass2){
        echo '<script language="javascript">alert("Las contraseñas deben coincidir");window.location.href="asignar_pass.php"</script>';
    }else{
    	$salt = "invalid";
    	$contraseñaful = md5($salt.$pass1);

    	if(!$mysqli->query("UPDATE `clientes` SET `password` = '$contraseñaful' WHERE `clientes`.`nCuenta`='$cuenta'")){
    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
    	}else{
    		session_destroy();
    		echo '<script language="javascript">alert("Contraseña creada correctamente");window.location.href="/index.php"</script>';
    	}

    	
    }
?>