<?php 
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuBank</title>
</head>
<body>

    <?php if(isset($_SESSION)){?>
        <div>Hola <?php echo $nombre?></div>
    <?php }?>
    <div>Aquí pongan informacion de la página</div>
    <a href="register.php">register feo</a>
    <a href="login.php">login feo</a>
    <a href="logout.php">cerrar sesion</a>
</body>
</html>