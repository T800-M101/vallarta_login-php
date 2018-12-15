
<?php



   require 'conexion.php';
	
   
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    
    $salida = "";

    $query = "SELECT info.matricula,info.a_paterno,info.a_materno,info.nombre,direc.calle,direc.municipio,direc.estado,direc.c_postal,direc.celular,direc.tel_casa,direc.tel_trabajo FROM informacion_personal info INNER JOIN direcciones direc ON info.matricula=direc.matricula ORDER By matricula LIMIT 5";


    if (isset($_POST['consulta'])) {
    
      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");


       $q = $conn->real_escape_string($_POST['consulta']);

       $query = "SELECT info.matricula,info.a_paterno,info.a_materno,info.nombre,direc.calle,direc.municipio,direc.estado,direc.c_postal,direc.celular,direc.tel_casa,direc.tel_trabajo FROM informacion_personal info INNER JOIN direcciones direc ON info.matricula=direc.matricula WHERE info.matricula LIKE '%$q%' OR info.a_paterno LIKE '%$q%' OR info.a_materno LIKE '%$q%' OR info.nombre LIKE '%$q%' OR direc.calle LIKE '%$q%' OR direc.municipio LIKE '%$q%' OR direc.estado LIKE '%$q%' OR direc.c_postal LIKE '%$q%' OR direc.celular LIKE '%$q%' OR direc.tel_casa LIKE '%$q%' OR direc.tel_trabajo LIKE '%$q%'";
       
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
                        <td>CALLE</td>
                        <td>MUNICIPIO</td>
                        <td>ESTADO</td>
                        <td>C.P.</td>
                        <td>CELULAR</td>
                        <td>TEL. CASA</td>
                        <td>TEL. TRABAJO</td>


                        
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['matricula']."</td>
    					<td>".$fila['a_paterno']."</td>
    					<td>".$fila['a_materno']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['calle']."</td>
                        <td>".$fila['municipio']."</td>
                        <td>".$fila['estado']."</td>
                        <td>".$fila['c_postal']."</td>
                        <td>".$fila['celular']."</td>
                        <td>".$fila['tel_casa']."</td>
                        <td>".$fila['tel_trabajo']."</td>


    				  </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
        
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>