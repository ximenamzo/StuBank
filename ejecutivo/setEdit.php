<?php
    session_start();

    include('../view/conexion.php');

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 2){
        session_destroy();
        header("Location: ../");
        die();
    }

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $aP = $_POST['aP'];
    $aM = $_POST['aM'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $curp = $_POST['curp'];
    $fecha = $_POST['fNa'];
    $guardar_img = $_FILES['foto']['tmp_name'];

    //$mysqli->query("UPDATE clientes SET nombre = '$nom', apellidoP = '$aP', apellidoM = '$aM', foto = '$id', telefono = '$tel', email = '$email', curp = '$curp', fecNac = '$fecha' WHERE nCuenta = '$id'")
    $stmt_edit = $mysqli->prepare("UPDATE clientes SET nombre = ?, apellidoP = ?, apellidoM = ?, foto = ?, telefono = ?, email = ?, curp = ?, fecNac = ? WHERE nCuenta = ?");
    $stmt_edit->bind_param("sssssssss", $nom, $aP, $aM, $id, $tel, $email, $curp, $fecha, $id);

    if(!$stmt_edit->execute()){
            echo "Inserción fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            header("Location: ejecutivo.php");
    }else{
        if($guardar_img != null){
            if(!file_exists('../src/fotosCl')){//Comprobamos si la carpeta "fotos" existe
                mkdir('../src/fotosCl',0777,true); //Creamos la carpeta y le damos permisos
                if(file_exists('../src/fotosCl')){//guardamos y movemos a nuestra carpeta
                    if(file_exists('../src/fotosCl/'.$id)){
                        unlink('../src/fotosCl/'.$id);
                    }
                    if(!move_uploaded_file($guardar_img,'../src/fotosCl/'.$id)){
                        echo '<script language="javascript">alert("Falló 1");</script>';
                    }
                }
            }else{
                if(file_exists('../src/fotosCl/'.$id)){
                    unlink('../src/fotosCl/'.$id);
                }
                if(move_uploaded_file($guardar_img,'../src/fotosCl/'.$id)){
                }else{
                    echo '<script language="javascript">alert("Procesando...");</script>';
                    // Esta alerta se genera cuando no se selecciona ninguna foto nueva
                    // No hay problema porque el sistema selecciona por defecto la anterior establecida
                }
            }
        }
    }
    echo '<script language="javascript">alert("Registro modificado correctamente.");window.location.href="ejecutivo.php"</script>';
?>