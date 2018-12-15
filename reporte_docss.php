
<!DOCTYPE html>
<html>
<head>
	<title>Documentos pendientes</title>
	<link rel="stylesheet" href="css/reporte_docs.css">
	<link rel="stylesheet" type="text/css" href="css/sistema.css">
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
	
<div >
<form  action="" method="post">
	<select name="opciones" id="opciones" onchange="return buscar();">		
	<option value="">Seleccionar reporte</option>	
	<option value="todo">Todo</option>	
	<option value="equivalencia">Equivalencia</option>	
	<option value="predictamen">Predictamen</option>
    </select>
</form>
</div>


<div class="main-container" >
	<table border=1 class='tabla_datos'>
		<thead>
			<tr>
				<th>MATRICULA</th><th>APELLIDO PATERNO</th><th>APELLIDO MATERNO</th><th>NOMBRE</th><th>ACTA</th><th>CERT.SEC.</th><th>KARDEX</th><th>CERT.PARCIAL</th><th>PREDICTAMEN</th><th>EQUIVALENCIA</th><th>CLAVE CURP</th><th>FOTOS</th><th colspan="2"></th>
			</tr>
		</thead>

		

		<?php
       
       require 'conexion.php';

      $pendiente = "pendiente";
      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");

      $consulta = "SELECT  info.matricula,info.a_paterno, info.a_materno,info.nombre, doc.acta_nac,doc.cert_sec,doc.kardex,doc.cert_parcial,doc.predictamen,doc.equivalencia, doc.clave_curp,doc.fotos FROM informacion_personal info  INNER JOIN documentos doc ON info.matricula = doc.matricula WHERE status=0";


    
     $ejecutar = mysqli_query($conn,$consulta);

       $i=0;     	

     while($fila = mysqli_fetch_array($ejecutar)){

       $matricula=$fila['matricula'];
       $apaterno=$fila['a_paterno'];
       $amaterno=$fila['a_materno'];
       $nombre=$fila['nombre'];
       $acta=$fila['acta_nac'];
       $cert_sec=$fila['cert_sec'];
       $kardex=$fila['kardex'];
       $cert_parcial=$fila['cert_parcial'];
       $predictamen=$fila['predictamen'];
       $equivalencia=$fila['equivalencia'];
       $clave_curp=$fila['clave_curp'];
       $fotos=$fila['fotos'];



      $i++;

?>
<tr >
    

	
	<td><?php echo $matricula; ?></td>
	<td><?php echo $apaterno; ?></td>
    <td><?php echo $amaterno; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $acta; ?></td>
	<td><?php echo $cert_sec; ?></td>
	<td><?php echo $kardex; ?></td>
	<td><?php echo $cert_parcial; ?></td>
	<td><?php echo $predictamen; ?></td>
	<td><?php echo $equivalencia; ?></td>
	<td><?php echo $clave_curp; ?></td>
	<td><?php echo $fotos; ?></td>
	<td><a href="reporte_docs.php?editar=<?php echo $matricula; ?>">EDITAR</a></td>


</tr>

<?php }?>

	
	</table>
</div>

<?php

  if(isset($_GET['editar'])){

   include("editar_docs.php");

  }

?>





</body>
</html>

