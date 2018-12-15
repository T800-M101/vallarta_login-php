
<?php



   require 'conexion.php';
	
   
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    
    $salida = "";

    $query = "SELECT info.matricula, info.a_paterno, info.a_materno,info.nombre,info.f_nac,info.curp, esco.grado,esco.turno,direc.celular FROM informacion_personal info  INNER JOIN escolaridad esco ON info.matricula = esco.matricula INNER JOIN direcciones direc ON  info.matricula = direc.matricula ORDER By matricula LIMIT 10";


    if (isset($_POST['consulta'])) {
    
      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");


       $q = $conn->real_escape_string($_POST['consulta']);

       $query = "SELECT info.matricula, info.a_paterno, info.a_materno,info.nombre,info.f_nac,info.curp, esco.grado,esco.turno,direc.celular FROM informacion_personal info  INNER JOIN escolaridad esco ON info.matricula = esco.matricula INNER JOIN direcciones direc ON  info.matricula= direc.matricula WHERE info.matricula LIKE '%$q%' OR info.a_paterno LIKE '%$q%' OR info.a_materno LIKE '%$q%' OR info.nombre LIKE '%$q%' OR info.f_nac LIKE '%$q%' OR info.curp LIKE '%$q%' OR esco.grado LIKE '%$q%' OR esco.turno LIKE '%$q%' OR direc.celular LIKE '%$q%'";
       
    }
 
    $resultado = $conn->query($query);

       

    

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>MATRICULA</td>
    					<td>APELLIDO PATERNO</td>
    					<td>APELLIDO MATERNO</td>
    					<td>NOMBRE</td>	
                        <td>FECHA NACIMIENTO</td>
                        <td>GRADO</td>
                        <td>TURNO</td>
                        <td>CURP</td>
                        <td>CELULAR</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['matricula']."</td>
    					<td>".$fila['a_paterno']."</td>
    					<td>".$fila['a_materno']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['f_nac']."</td>
                        <td>".$fila['grado']."</td>
                        <td>".$fila['turno']."</td>
                        <td>".$fila['curp']."</td>
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

