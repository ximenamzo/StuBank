<?php

    session_start();

    include('../view/conexion.php');

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    $id = $_REQUEST['id'];

    $nom = $_POST['nom'];
    $aP = $_POST['aP'];
    $aM = $_POST['aM'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $curp = $_POST['curp'];
    $fecha = $_POST['fNa'];
    $guardar_img = $_FILES['foto']['tmp_name'];

    if (!$mysqli->query("UPDATE trabajadores SET nombre = '$nom', apelldoP = '$aP', apellidoM = '$aM', foto = '$id', telefono = '$tel', email = '$email', curp = '$curp', fecNac = '$fecha' WHERE nCuenta = '$id'")){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            header("Location: admin_eje.php");
    }else{ 
        if(!file_exists('../src/fotos')){//Comprobamos si la carpeta "fotos" existe
                mkdir('../src/fotos',0777,true); //Creamos la carpeta y le damos permisos
                if(file_exists('../src/fotos')){//guardamos y movemos a nuestra carpeta
                    if(file_exists('../src/fotos/'.$id)){
                        unlink('../src/fotos/'.$id);
                    }
                    if(move_uploaded_file($guardar_img,'../src/fotos/'.$id)){
                    }else{
                        echo '<script language="javascript">alert("Falló 1");</script>';
                    }
                }
            }else{
                if(file_exists('../src/fotos/'.$id)){
                    unlink('../src/fotos/'.$id);
                }
                if(move_uploaded_file($guardar_img,'../src/fotos/'.$id)){
                }else{
                    echo '<script language="javascript">alert("Falló 2");</script>';
                }
            }
        echo '<script language="javascript">alert("Registro agregado correctamente");window.location.href="admin_eje.php"</script>';
    }
?>