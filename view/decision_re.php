<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="..\src\css\styles-decision.css">
	<link rel="stylesheet" href="../src/css/estilos.css">
    <link rel="icon" type="image/png" href="../src/icono.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	    <!--<link rel="stylesheet" href="../src/css/bootstrap.min.css">-->
    <title>Stubank</title>
</head>
<body>
	<div class="contenedor mt-5">
		<div class="imagen">
			<img src="../src/StuBank.png" class="logo">
		</div>
		<p class="titulo">¿Eres un cliente o un trabajador?</p>
		<div class="row" style="text-align:center;">
			<div class="col-md-2">
				<img src="../src/cliente.jpg" class="client-img">
			</div>
			<div class="col-md-10">
				<a href="../cliente/register_cl.php"><button class="btn-subir">Cliente</button></a>
			</div>
		</div>
		<div class="row" style="text-align:center;">
			<div class="col-md-2">
				<img src="../src/ejecutivo.jpg" class="img-exe">
			</div>
			<div class="col-md-10">
				<a href="../ejecutivo/register_eje.php"><button class="btn-subir">Trabajador</button></a>
			</div>
		</div>
	</div>
    <!--<script type="text/javascript" src="../src/js/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>-->
</body>
<footer style="margin-top:10rem;">
    <?php include('../view/footer.php'); ?>
</footer>
</html>