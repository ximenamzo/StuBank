<?php 
    session_start();
    
    if(isset($_SESSION['nombre'])){
        $nombre = $_SESSION['nombre'];
        $rol = $_SESSION['rol'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="src/icono.png">
    <title>StuBank</title>
</head>

<header>
    <?php include('view/navbar.php'); ?>
</header>
<body>
    <div class="banner">
        <div class="banner--header">
            <h1>HERRAMIENTA FINANCIERA PARA MOVIMIENTOS BANCARIOS ONLINE</h1>
            <a class="btn btn-secondary disabled" role="button" aria-disabled="true">Leer más</a><br><br>
        </div>
        <img src="./src/R.jpg" width="562px" height="363px" alt="">
    </div>
    
    <section class="seccion2">
        <div class="contenedor-beneficios">
            <h2>Beneficios de ser cliente</h2><br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo in repellat, error praesentium ullam labore at, ad tempora consequuntur aspernatur, nulla incidunt voluptatum consequatur eveniet assumenda amet laborum. Ea, non?</p>
            <img src="./src/beneficios.png" alt="">
        </div>
    </section>
</body>
<footer>
    <?php include('view/footer.php'); ?>
</footer>
</html>