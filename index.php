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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="src/css/styles_index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('importante/navbar.php'); ?>
</header>
 <body>
  <div class="banner">
        <div class="banner--header">
          <h1>FINANCIAL WEB TOOL FOR ACCOUNT MANAGEMENT AND BANKING MOVEMENTS</h1>
          <a class="btn btn-secondary disabled" role="button" aria-disabled="true">Learn more</a>
        </div>
        <img src="./src/img/R.jpg" width="562px" height="363px" alt="">
      </div>
      <section class="seccion2">
          <div class="contenedor-beneficios">
              <h2>About us</h2>
              <br>
              <p>Stubank es una aplicacion financiera pensada para los jovenes estudiantes que estan comanzando con su vida financera!
                Es una aplicacion que va a marcar una nueva etapa de su vida en donde comianzan a ser personas con responsabilidades de adultos y podran manejar sus cuentas a travez de una aplicacion
                pensada principalmente para los jovenes estudiantes como lo es Stubank.
              </p>
              <img src="./src/img/beneficios.png" alt="">
          </div>
      </section>
      <section class="seccion3">
        <div class="info_index">
          <h2>En esta aplicacion podras hacer lo siguiente:</h2>
        </div>
      </section>
    </main>
  </body>
</html>