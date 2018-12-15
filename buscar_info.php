
<?php



   require 'conexion.php';
	
   
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    
    $salida = "";

    $query = "SELECT * FROM informacion_personal  ORDER By matricula LIMIT 5";


    if (isset($_POST['consulta'])) {
    
      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");


       $q = $conn->real_escape_string($_POST['consulta']);

       $query = "SELECT * FROM informacion_personal  WHERE matricula LIKE '%$q%' OR a_paterno LIKE '%$q%' OR a_materno LIKE '%$q%' OR nombre LIKE '%$q%' OR f_nac LIKE '%$q%' OR l_nac LIKE '%$q%' OR estado_nac LIKE '%$q%' OR curp LIKE '%$q%'";
       
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
                        <td>LUGAR NACIMIENTO</td>
                        <td>ESTADO</td>
                        <td>CURP</td>
                        
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
                        <td>".$fila['l_nac']."</td>
                        <td>".$fila['estado_nac']."</td>
                        <td>".$fila['curp']."</td>
    				  </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
        
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>