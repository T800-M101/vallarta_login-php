<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/b_alumnos.css"> 
	
	<title>Busqueda rápida</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Sistema Control Escolar BCV</h1>
			<div class="optionsBar">
				
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="sistema.php">Inicio</a></li>
				<li class="principal">
					<a href="#">Alumnos</a>
					<ul>
						<li><a href="inscribir.php">Inscribir</a></li>
						<li><a href="modificar_info.php">Modificar ficha</a></li>
						<li><a href="buscar_alumnos.php">Busqueda rapida</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Cobranza</a>
					<ul>
						<li><a href="#">Registrar cobro</a></li>
						<li><a href="#">Atrazos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Reportes</a>
					<ul>
						<li><a href="reporte_docs.php">documentos pendientes</a></li>
						<li><a href="#">En construccion</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Pendiente</a>
					<ul>
						<li><a href="#">En construccion</a></li>
						<li><a href="#">En construccion</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Pendiente</a>
					<ul>
						<li><a href="#">En construccion</a></li>
						<li><a href="#">En construccion</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

<section class="principal">


	<div align="center" class="formulario">
		
		<input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar..."></input>

		
	</div>

	<div id="datos"></div>
	
	
</section>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>