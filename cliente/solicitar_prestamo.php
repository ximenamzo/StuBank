
<?php

    include('../view/conexion.php');

    if (isset($_POST['solicitar_prestamo'])) {

        $nombreCliente = $_POST['nombreCliente'];
        $cantidad = $_POST['cantidad'];
        $meses = $_POST['meses'];

        if(!$mysqli->query("INSERT INTO prestamos (nombreCliente, cantidad, meses) VALUES ('$nombreCliente', '$cantidad','$meses')")){
    		echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
    	}else{
    		session_destroy();
    		echo '<script language="javascript">alert("Registro Correcto");window.location.href="/index.php"</script>';
    	}
    
    }
?>