<?php
    $id = $_REQUEST['id'];

    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

    if($rol != 1){
        header("Location: ../index.php");
    }

    include('../importante/conexion.php');

    $obtencion = "SELECT * FROM clientes WHERE nCuenta = '$id'";
    $resultado = mysqli_query($mysqli,$obtencion);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

    function edad($fecha_nacimiento){
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }

    foreach($clientes as $cliente):
        $eje = $cliente['nEjecutivo'];
    endforeach;

    $obtencion2 = "SELECT * FROM trabajadores WHERE nCuenta = '$eje'";
    $resultado2 = mysqli_query($mysqli,$obtencion2);
    $ejecutivos = $resultado2->fetch_all(MYSQLI_ASSOC);

    foreach($ejecutivos as $ejecutivo):
        $nomEje = $ejecutivo['nombre'];
        $aPeje = $ejecutivo['apelldoP'];
        $aMeje = $ejecutivo['apellidoM'];
    endforeach;

    $obtencion3 = "SELECT * FROM trabajadores WHERE nCuenta != '$eje' AND rol = '2' AND estatus = '1'";
    $resultado3 = mysqli_query($mysqli,$obtencion3);
    $ejecutivos2 = $resultado3->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('../importante/navbar.php'); ?>
</header>
<body>
    <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-md-9">
            <h1>Ficha del cliente</h1>
            <?php foreach($clientes as $cliente): ?>
                <img style="width: 10pc;" src="../src/fotosCl/<?=$cliente['foto']?>"><br>
                <label>Numero de cliente:</label> <?=$cliente['nCuenta']?><br>
                <label>Nombre:</label> <?=$cliente['nombre']." ".$cliente['apellidoP']." ".$cliente['apellidoM']?><br>
                <label>Edad:</label> <?=edad($cliente['fecNac'])?><br>
                <label>Telefono:</label> <?=$cliente['telefono']?><br>
                <label>Correo electronico:</label> <?=$cliente['email']?><br>
                <label>CURP:</label> <?=$cliente['curp']?><br>
                <label>Activo desde el:</label> <?=$cliente['fecInscrip']?><br><br>
                <label>Ejecutivo asignado:</label> <?=$nomEje?> <?=$aPeje?> <?=$aMeje?><br>
                <label>Cuenta del ejecutivo: </label> <?=$cliente['nEjecutivo'];?><br>

                <form action="setEditCl.php?id=<?php echo $cliente['nCuenta'];?>" method="post" enctype="multipart/form-data">
                    <select name="nuevoEje">
                        <option value="0" selected disabled>Seleccione el nuevo ejecutivo</option>
                        <?php foreach($ejecutivos2 as $ejecutivo2): ?>
                            <option value="<?=$ejecutivo2['nCuenta']?>"><?=$ejecutivo2['nombre']." ".$ejecutivo2['apelldoP']." ".$ejecutivo2['apellidoM']?></option>
                        <?php endforeach ?>
                    </select><br>
                    <a href="admin_cl.php" class="btn btn-secondary">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Editar">
                </form>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>