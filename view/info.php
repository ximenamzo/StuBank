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
    <link rel="stylesheet" href="src/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="src/icono.png">
    <title>StuBank</title>
</head>

<header>
    <?php include('navbar.php'); ?>
</header>
<body>
    <br>
    <h2>Info del gestor</h2>
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras enim sapien, consequat sed augue vitae, rhoncus elementum risus. 
        Proin condimentum malesuada quam ac pulvinar. Cras consectetur turpis in feugiat bibendum. 
        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
        Integer ac odio suscipit, pharetra lectus id, scelerisque magna. Integer bibendum sagittis odio, efficitur interdum nibh molestie vel. 
        Pellentesque facilisis feugiat eros eu ullamcorper. Mauris suscipit nisl non aliquet consequat. 
        Curabitur tristique risus leo, sit amet sollicitudin arcu eleifend sed.</h5>
</body>
</html>