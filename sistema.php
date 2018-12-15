
<?php
	$servername = "localhost";
    $username = "root";
  	$password = "CrayolA1";
  	$dbname = "vallarta";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

   


    $query = mysqli_query("SELECT count(*)  as cuenta FROM informacion_personal",$conn);


    $resultado = mysqli_fetch_assoc($query);

    echo  $resultado['cuenta'];

    

    $conn->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/sistema.css">
	<title>Sistema de Control Escolar</title>
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
					<a href="blank.html">Alumnos</a>
					<ul>
						<li><a href="inscribir.php">Inscribir</a></li>
						<li><a href="modificar_info.php">Modificar Ficha</a></li>
						<li><a href="buscar_alumnos.php">Busqueda rapida</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="blank.html">Cobranza</a>
					<ul>
						<li><a href="#">Registrar cobro</a></li>
						<li><a href="#">Atrazos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="blank.html">Reportes</a>
					<ul>
						<li><a href="reporte_docs.php">Documentos pendientes</a></li>
						<li><a href="#">En construccion</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="blank.html">Pendiente</a>
					<ul>
						<li><a href="#">En construccion</a></li>
						<li><a href="#">En construccion</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="blank.html">Pendiente</a>
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<div align="center">
		<img width="300" height="200" src="/img/logo.jpg">

	</div>
</body>
</html>