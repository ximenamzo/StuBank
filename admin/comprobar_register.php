<?php
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    $cuenta = $_POST['nCuenta'];
    $userR = $_POST['name_user'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correoR = $_POST['correo_user'];
    $telefonoR = $_POST['telefono_user'];
    $nacimiento = $_POST['fecNac'];
    $curp = $_POST['curp'];
    $fecha = date('Y-m-d');
    $foto = $_FILES['foto']['name'];
    $guardar_img = $_FILES['foto']['tmp_name'];

    //llamamos a la conexion de base datos
    include('../view/conexion.php');

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
        if (!$mysqli->query("INSERT INTO `trabajadores` (`nCuenta`,`nombre`,`apelldoP`, `apellidoM`, `foto`, `telefono`,`fecNac`, `email`, `curp`, `fecInscrip`) VALUES ('$cuenta','$userR', '$apellidoP', '$apellidoM', '$cuenta', '$telefonoR','$nacimiento', '$correoR', '$curp', '$fecha')")){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            if(!file_exists('../src/fotos')){//Comprobamos si la carpeta "fotos" existe
                mkdir('../src/fotos',0777,true); //Creamos la carpeta y le damos permisos
                if(file_exists('../src/fotos')){//guardamos y movemos a nuestra carpeta
                    if(move_uploaded_file($guardar_img,'../src/fotos/'.$cuenta)){
                        echo "Archivo Guardado con Exito";
                    }else{
                        echo '<script language="javascript">alert("Falló");';
                        header("Location: admin_eje.php");
                    }
                }
            }else{
                if(move_uploaded_file($guardar_img,'../src/fotos/'.$cuenta)){
                    echo "Archivo Guardado con Exito";
                }else{
                    echo '<script language="javascript">alert("Falló");';
                    header("Location: admin_eje.php");
                }
            }
            echo '<script language="javascript">alert("Registro agregado correctamente");window.location.href="admin_eje.php"</script>';
        }
    }else{
        echo '<script language="javascript">alert("Ingresaste un usuario existente");window.location.href="admin_eje.php"</script>';
    }
?>