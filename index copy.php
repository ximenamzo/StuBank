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
    <script src="/src/js/scroll.js"></script>
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
    <div>
        <a href="#top" class="scroll">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
            </svg>
        </a>
    </div>
</body>
<footer>
    <?php include('view/footer.php'); ?>
</footer>
</html>