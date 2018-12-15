<?php



   require 'conexion.php';
	
   
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    
    $salida = "";

    $query = "SELECT  info.matricula,info.a_paterno, info.a_materno,info.nombre, doc.acta_nac,doc.cert_sec,doc.kardex,doc.cert_parcial,doc.predictamen,doc.equivalencia, doc.clave_curp,doc.fotos FROM informacion_personal info  INNER JOIN documentos doc ON info.matricula = doc.matricula WHERE doc.status=0";

    //$query = "SELECT info.matricula,info.a_paterno,info.a_materno,info.nombre,direc.calle,direc.municipio,direc.estado,direc.c_postal,direc.celular,direc.tel_casa,direc.tel_trabajo FROM informacion_personal info INNER JOIN direcciones direc ON info.matricula=direc.matricula ORDER By matricula LIMIT 5";//


    if (isset($_POST['consulta'])) {
    
      mysqli_query($conn,"SET CHARACTER SET 'utf8'");
      mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");


       $q = $conn->real_escape_string($_POST['consulta']);

       $query = "SELECT info.matricula,info.a_paterno,info.a_materno,info.nombre,doc.acta_nac,doc.cert_sec,doc.kardex,doc.cert_parcial,doc.predictamen,doc.equivalencia, doc.clave_curp,doc.fotos FROM informacion_personal info  INNER JOIN documentos doc ON info.matricula = doc.matricula WHERE info.matricula LIKE '%$q%' OR info.a_paterno LIKE '%$q%' OR info.a_materno LIKE '%$q%' OR info.nombre LIKE '%$q%' OR doc.acta_nac LIKE '%$q%' OR doc.cert_sec LIKE '%$q%' OR doc.kardex LIKE '%$q%' OR doc.cert_parcial LIKE '%$q%' OR doc.predictamen LIKE '%$q%' OR doc.equivalencia LIKE '%$q%' OR doc.clave_curp LIKE '%$q%' OR doc.fotos LIKE '%$q%'";
       
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
                        <td>ACTA</td>
                        <td>CERT.SEC.</td>
                        <td>KARDEX</td>
                        <td>CERT.PARCIAL</td>
                        <td>PREDICTAMEN</td>
                        <td>EQUIVALENCIA</td>
                        <td>CURP</td>
                        <td>FOTOS</td>



                        
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['matricula']."</td>
    					<td>".$fila['a_paterno']."</td>
    					<td>".$fila['a_materno']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['acta_nac']."</td>
                        <td>".$fila['cert_sec']."</td>
                        <td>".$fila['kardex']."</td>
                        <td>".$fila['cert_parcial']."</td>
                        <td>".$fila['predictamen']."</td>
                        <td>".$fila['equivalencia']."</td>
                        <td>".$fila['clave_curp']."</td>
                        <td>".$fila['fotos']."</td>


    				  </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
        
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>