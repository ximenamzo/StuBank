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
    <meta name="viewport" content="width=device-width, minimum-s">
    <link rel="stylesheet" href="src/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="src/icono.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
                <img src="./src/R.jpg" width="592px" height="413px" alt="">
        </div>
     <section class="seccion2">
        <div class="contenedor-beneficios">
            <h2>Beneficios de ser cliente</h2><br>
            <p>Al ser cliente en Stubank, tendras acceso a nuestra plataforma la cual esta disenada para gestionar tus finanzas y ademas podras hacer lo siguiente:</p>
            <img src="./src/beneficios.png" alt="" class="img-contenedorbeneficios">
        </div>
     </section>
     <section class="seccion3">
        <div class="container_cards">
            <div class="card" style="background-color:#8F15EF;  border-radius:50px;">
                <figure>
                    <img src="/src/img/prestamo.png" alt="" width="100" height="150" >
                    <div class="card-contenido">
                        <h3>Solicitar prestamos</h3>
                        <button type="button" class="btn btn-outline-light">Leer mas</button>
                    </div>
                </figure>
            </div>
            <div class="card" style="background-color:#8F15EF;  border-radius:50px;">
                <figure>
                    <img src="/src/img/transfe.png" alt="" width="100" height="150">
                    <div class="card-contenido">
                        <h3>Hacer tranferencias</h3>
                        <button type="button" class="btn btn-outline-light">Leer mas</button>
                    </div>
                </figure>
            </div>
            <div class="card" style="background-color:#8F15EF; border-radius:50px;">
                <figure>
                    <img src="/src/img/estado.png" alt="" width="100" height="150">
                    <div class="card-contenido">
                        <h3>Ver tu estado de cuenta</h3>
                        <button type="button" class="btn btn-outline-light">Leer mas</button>
                    </div>
                </figure>
            </div>

        </div>
     </section>
     <footer class="footer">
        <div class="container-footer">
            <div class="box-footer">
                <a href="#">
                    <figure>
                        <img src="src/img/logopng.png" alt="">
                    </figure>
                </a>
            </div>
            <div class="box-footer">
                <h3>Miembros del equipo</h3>
                <p>Cruz Lopez Claudia Sofia Guadalupe</p>
                <p>Larios Armando</p>
                <p>Lopez Murillo Isaac Valentin</p>
                <p>Nolasco Lagunas Carlos</p>
                <p>Manzo Castrejon Ximena</p>
            </div>
            <div class="box-footer">
                <h3>Contacto</h3>
                <div class="contacto">
                    <a href="#">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                     <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                     </svg>
                   </a>
                    <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                    </a>
                    <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                    </a>
                    <a href="#"></a>
                </div>
                <br>
                <h3>Aviso de privacidad</h3>
                <a href="#"></a>
            </div>
        </div>
        <div class="container-footer2">
            <small>&copy; <b>StuBank</b>-Todos los derechos reservados</small>
        </div>
     </footer>
</body>
</html>