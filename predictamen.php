<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/sistema.css">
	<link rel="stylesheet" type="text/css" href="css/equivalencia.css">
<script type="text/javascript">
		function buscar(){
         var opcion=document.getElementById('opciones').value;
         var todo= new String("todo");
         var eq=new String("equivalencia");
         var pre=new String("predictamen");
if(opcion==todo)
location.href="http://localhost/reporte_docs.php";


if(opcion==eq)
location.href="http://localhost/equivalencia.php";


if(opcion==pre)
location.href="http://localhost/predictamen.php";


		}
	</script>
	<title>Predictamen</title>
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
						<li><a href="reporte_docs.php">Documentos pendientes</a></li>
						<li><a href="equivalencia.php">Equivalencia</a></li>
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
	


	<form action="opciones.php" method="post">
	<select name="opciones" id="opciones" onchange="return buscar();">		
	<option value="">Seleccionar reporte</option>
	<option value="todo">Todo</option>	
	<option value="equivalencia">Equivalencia</option>	
	<option value="predictamen">Predictamen</option></select></form>
	



	<?php

     require 'conexion.php';

     $copia="c";
     $pendiente = "p";
     $salida="";

      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");

     $query = "SELECT info.matricula, info.a_paterno, info.a_materno,info.nombre, esco.grado,esco.turno,direc.celular,docu.predictamen FROM informacion_personal info  INNER JOIN escolaridad esco ON info.matricula = esco.matricula INNER JOIN direcciones direc ON  info.matricula= direc.matricula INNER JOIN documentos docu ON info.matricula = docu.matricula WHERE docu.predictamen ='$copia' || docu.predictamen='$pendiente'";

     $ejecutar = mysqli_query($conn,$query);

     if ($ejecutar->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>MATRICULA</td>
    					<td>APELLIDO PATERNO</td>
    					<td>APELLIDO MATERNO</td>
    					<td>NOMBRE</td>
                        <td>GRADO</td>
                        <td>TURNO</td>
                        <td>PREDICTAMEN</td>
                        <td>CELULAR</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $ejecutar->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['matricula']."</td>
    					<td>".$fila['a_paterno']."</td>
    					<td>".$fila['a_materno']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['grado']."</td>
                        <td>".$fila['turno']."</td>
                        <td>".$fila['predictamen']."</td>
                        <td>".$fila['celular']."</td>
                        
    				  </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();
     

	?>
</body>
</html>