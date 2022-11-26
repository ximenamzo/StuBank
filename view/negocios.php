<?php 
    session_start();
    
    if(isset($_SESSION['nombre'])){
        $nombre = $_SESSION['nombre'];
        $rol = $_SESSION['rol'];
    }
?>

<!DOCTYPE html> 
<!--
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/estilos.css">
    <link rel="stylesheet" href="../src/css/ficha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../src/icono.png">
    <script src="/src/js/scroll.js"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('navbar.php'); ?>
</header>
<body>
    <main>
        <div class="row" style="text-align:center;">
            <h1 class="negh1">¿Te gustaría trabajar en StuBank?</h1>            
        </div>

        <div class="row" style="margin-top:3rem;">
            <div class="col-md-3 negimg">
                <img src="../src/ejeneg.png"  width="90%" alt="">
            </div>
            <div class="col-md-9 neginfo">
                <div class="row neginfo">
                    <h3 style="margin-bottom:2rem;">Aquí hay algunos puestos que podrían interesarte...</h3>
                </div>
                <div class="row neginfo">
                    <div class="col-md-4 colinfo">
                        <h4 class="colinfo" style="color:#8c52ff;">Ejecutivo</h4>
                        <h6 class="colinfo">Sé parte de nuestro equipo de ejecutivos y ten a tu servicio a clientes...</h6>
                        <h5 class="colinfo">Requisitos:</h5>
                        <h6 class="colinfo">&#9679; Bachillerato terminado<br>&#9679; Acta de nacimiento<br>&#9679; CURP<br>&#9679; Número telefónico<br>&#9679; Email activo<br>&#9679; Fotografía vigente<br>&#9679; Responsabilidad</h6>
                        <div class="btnneg">
                            <a href="mailto: stubank.contacto@gmail.com" class="btn-custom">Aplicar</a>
                        </div>
                    </div>
                    <div class="col-md-4 colinfo">
                        <h4 class="colinfo" style="color:#8c52ff;">Desarrollador</h4>
                        <h6 class="colinfo">Programa y da mantenimiento a nuestra aplicación web!</h6>
                        <h5 class="colinfo">Requisitos:</h5>
                        <h6 class="colinfo">&#9679; Conocimientos en web dev<br>&#9679; Acta de nacimiento<br>&#9679; CURP<br>&#9679; Número telefónico<br>&#9679; Email activo<br>&#9679; Fotografía vigente</h6>
                        <div class="btnneg">
                            <a class="btn-custom-disabled" disabled>No disponible</a>
                        </div>
                    </div>
                    <div class="col-md-4 colinfo">
                        <h4 class="colinfo" style="color:#8c52ff;">Tester</h4>
                        <h6 class="colinfo">Gana dinero por navegar por nuestra aplicación y reportar errores.</h6>
                        <h5 class="colinfo">Requisitos:</h5>
                        <h6 class="colinfo">&#9679; Conocimientos en web dev<br>&#9679; Documentación de software<br>&#9679; Técnico programador<br>&#9679; Acta de nacimiento<br>&#9679; CURP<br>&#9679; Número telefónico<br>&#9679; Email activo<br>&#9679; Fotografía vigente</h6>
                        <div class="btnneg">
                            <a class="btn-custom-disabled" disabled>No disponible</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row" style="text-align:center; margin-top:4rem;">
            <h1 class="negh1-2">¿Necesitas el gestor de StuBank para tu propio negocio bancario?</h1>            
        </div>

        <div class="row" style="margin-top:3rem;">
            <div class="col-md-3" style="text-align:center;">
                <img src="../src/company.png"  width="90%" alt="">
            </div>
            <div class="col-md-6 neginfo" style="text-align:center;">
                <p class="tuyo">¡ES TUYO!</p>
                <p class="tuyop">Contáctanos vía email y agendaremos una serie de reuniones para que los servicios de gestión de StuBank sean para ti y tu negocio.</p>
                <a class="btn-custom"><i class="bi bi-arrow-down"></i>A un click del éxito de tu empresa<i class="bi bi-arrow-down"></i></a> <br><br>
                <a href="mailto: stubank.contacto@gmail.com" class="btn-custom-outline"><i class="bi bi-hand-index-thumb-fill"></i></a>
            </div>
            <div class="col-md-3" style="text-align:center;">
                <img src="../src/acuerdo.png"  width="90%" alt="">
            </div>
        </div>
    </main>
    <div>
        <a href="#top" class="scroll">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
            </svg>
        </a>
    </div>
</body>
<footer style="margin-top:10rem;">
    <?php include('footer.php'); ?>
</footer>
<script>
    function goto(url)
    {
    window.location=url;
    }
</script>
</html>