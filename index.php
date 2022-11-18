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
    <link rel="stylesheet" href="./src/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="src/icono.png">
    <script src="/src/js/scroll.js"></script>
    <title>StuBank</title>
</head>

<header>
    <?php include('view/navbar.php'); ?>
</header>
<body>
  <div class="cabecera">
    <div class="container">
      <section class="banner-container">
        <div class="banner-texts">
          <img src="./src/Stubankk.png" width="40%" alt="" style="margin:6rem 0 6rem 0;">
          <h4 class="banner-sub" style="margin:0 0 4rem 0;">Aplicación web de gestión de finanzas ideal para movimientos bancarios y pago a servicios.</h4>
          <button type="button" class="btn btn-outline-light btn-lg" onclick="goto('#qsomos')">¡Leer más!</button>
        </div>
      </section>
    </div>
</div>

  <main>
    <section class="qsomos" id="qsomos">
      <div class="contenedor2">
        <h2 class="subtitulo">Sobre StuBank</h2>
        <p>Stubank es una aplicación para gestión financiera que optimiza
          los servicios de una institución bancaria. Desde esta aplicación, los ejecutivos y clientes
          pueden realizar los movimientos principales dentro de las diferentes cuentas que el gestor admite.
        </p>
        <img src="./src/undraw_my_password_re_ydq7.svg" class="qsomos_img" width="50%" alt="" style="margin-left:15%;">
      </div>
    </section>

    <section class="beneficios_container">
      <div class="beneficios_cont">
        <h2 class="subtitulo">Beneficios de ser cliente</h2>
        <p class="beneficios_lista">
          - Podrás depositar y retirar efectivo en los centros de StuBank
          <br> <br>
          - Tendrás acceso a tu cuenta las 24 hrs del dia los 7 dias de la semana
          <br><br>
          - Podras realizar transferencias a otras cuentas del mismo banco
          <br><br>
          - Puedes pagar tus servicios y contratar tiempo aire
          <br><br>
          - Tienes la oportunidad de abrir hasta 5 cuentas!
        </p>
        <img src="./src/undraw_pay_online_re_aqe6.svg"  width="70%" alt="" style="margin-left:25%;">
      </div>
    </section>
    
    <div class="row">
      <h2>Al ser cliente podras:</h2>
      <div class="container_cards">
          <div class="card col-md-3" style="background-color:#8c52ff;  border-radius:50px;">
              <figure>
                  <img src="./src/prestamo.png" alt="" width="100" height="150" >
                  <div class="card-contenido">
                      <h3>Solicitar prestamos</h3>
                      <button type="button" class="btn btn-outline-light">Leer mas</button>
                  </div>
              </figure>
          </div>
          <div class="card col-md-3" style="background-color:#8c52ff;  border-radius:50px;">
              <figure>
                  <img src="./src/transfe.png" alt="" width="100" height="150">
                  <div class="card-contenido">
                      <h3>Hacer tranferencias</h3>
                      <button type="button" class="btn btn-outline-light">Leer mas</button>
                  </div>
              </figure>
          </div>
          <div class="card col-md-3" style="background-color:#8c52ff; border-radius:50px;">
              <figure>
                  <img src="./src/estado.png" alt="" width="100" height="150">
                  <div class="card-contenido">
                      <h3>Ver tu estado de cuenta</h3>
                      <button type="button" class="btn btn-outline-light">Leer mas</button>
                  </div>
              </figure>
          </div>

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

<footer class="footer">
   <div class="container-footer">
       <div class="box-footer">
           <a>
               <figure>
                   <img src="./src/Stubankpng.png" alt="">
               </figure>
           </a>
       </div>
       <div class="box-footer">
           <h3 style="margin-bottom:1rem;">Equipo de desarrollo</h3>
           <h6>Cruz Lopez Claudia Sofia Guadalupe</h6>
           <h6>Larios Arreola Armando</h6>
           <h6>Lopez Murillo Isaac Valentin</h6>
           <h6>Manzo Castrejon Ximena</h6>
           <h6>Nolazco Lagunas Carlos</h6>
       </div>
       <div class="box-footer">
           <h3>Contacto</h3>
           <div class="contacto">
               <a href = "mailto: contacto.stubank@gmail.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
                </a>
                <a href = "mailto: contacto.stubank@gmail.com">contacto.stubank@gmail.com</a>
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
<script>
    function goto(url)
    {
    window.location=url;
    }
</script>
</html>