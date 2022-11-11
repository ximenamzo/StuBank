<?php
    session_start();

    include('../view/conexion.php');

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
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


    $stmt_edit = $mysqli->prepare("UPDATE trabajadores SET nombre = ?, apellidoP = ?, apellidoM = ?, foto = ?, telefono = ?, email = ?, curp = ?, fecNac = ? WHERE nCuenta = ?");
    $stmt_edit->bind_param("ssssssssi",$nom,$aP,$aM,$id,$tel,$email,$curp,$fecha,$id);

    if (!$stmt_edit->execute()){
            echo "Actualización fallida: (" . $mysqli->errno . ") " . $mysqli->error;
            header("Location: admin_eje.php");
    }else{
        if($guardar_img != null){
            if(!file_exists('../src/fotos')){//Comprobamos si la carpeta "fotos" existe
                mkdir('../src/fotos',0777,true); //Creamos la carpeta y le damos permisos
                if(file_exists('../src/fotos')){//guardamos y movemos a nuestra carpeta
                    if(file_exists('../src/fotos/'.$id)){
                        unlink('../src/fotos/'.$id);
                    }
                    if(!move_uploaded_file($guardar_img,'../src/fotos/'.$id)){
                        echo '<script language="javascript">alert("Falló 1");</script>';
                    }
                }
            }else{
                if(file_exists('../src/fotos/'.$id)){
                    unlink('../src/fotos/'.$id);
                }
                if(move_uploaded_file($guardar_img,'../src/fotos/'.$id)){
                }else{
                    echo '<script language="javascript">alert("Procesando...");</script>'; 
                    // Esta alerta se genera cuando no se selecciona ninguna foto nueva
                    // No hay problema porque el sistema selecciona por defecto la anterior establecida
                }
            }
        }
    }
     echo '<script language="javascript">alert("Registro modificado correctamente.");window.location.href="admin_eje.php"</script>';
?>