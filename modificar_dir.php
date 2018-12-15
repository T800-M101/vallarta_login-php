<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/b_alumnos.css"> 
 <script type="text/javascript">
    function buscar(){
         var opcion=document.getElementById('opciones').value;
         var info= new String("Información Personal");
         var direc=new String("Domicilio");
         var esco=new String("Escolaridad");
if(opcion==info)
location.href="http://localhost/modificar_info.php";


if(opcion==direc)
location.href="http://localhost/modificar_dir.php";


if(opcion==esco)
location.href="http://localhost/modificar_esco.php";


    }
  </script>
  <title>Dirección</title>
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
            <li><a href="modificar_info.php">Ficha alumno</a></li>
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

  <div align="center" >
    
  <form  method="POST">
  <select name="opciones" id="opciones" onchange="return buscar();"> 
  <option value="">Seleccionar ficha</option>   
  <option value="Información Personal">Información Personal</option>  
  <option value="Domicilio">Información de Contacto</option>  
  <option value="Escolaridad">Escolaridad</option></select> </form>
  </div>

<div align="center">
<section class="principal">
  <div class="formulario" >
    <form method="POST">
    <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar..."></input>
    <input type="submit" name="editar" value="SELECCIONAR..." class="button">

  </div>

  <div id="datos"></div>
    
</section>
</div>

<?php
     require 'conexion.php';

    if(isset($_POST['editar'])){
       $id=$_POST['caja_busqueda'];

       $consulta="SELECT  info.matricula, info.a_paterno, info.a_materno,info.nombre, direc.calle,direc.municipio,direc.estado,direc.c_postal,direc.celular,direc.tel_casa,direc.tel_trabajo FROM informacion_personal info INNER JOIN  direcciones direc ON info.matricula=direc.matricula WHERE info.matricula ='$id'";

       $ejecutar = mysqli_query($conn,$consulta);
       $fila=mysqli_fetch_array($ejecutar);

       $id=$fila['matricula'];
      
       $apaterno = $fila['a_paterno'];
       $amaterno = $fila['a_materno'];
       $nombre = $fila['nombre'];
       $calle = $fila['calle'];
       $muni = $fila['municipio'];
       $est = $fila['estado'];
       $postal = $fila['c_postal'];
       $cel = $fila['celular'];
       $tcasa = $fila['tel_casa'];
       $ttrabajo = $fila['tel_trabajo'];

    }
     


?>

<br>

<div align="center">
<form method="POST" align=center>  
 <table>
    <tr >
      <th >MATRICULA</th>
      <th>PATERNO</th>
      <th>MATERNO</th>
      <th>NOMBRE</th>
      <th>CALLE</th>
      <th>MUNICIPIO</th>
      <th>ESTADO</th>
      <th>C.P.</th>
       <th>CEL</th>
        <th>TEL. CASA</th>
         <th>TEL. TRABAJO</th>

    </tr> 

    <tr>
  <td> <input type="text" name="mat" size="5" style="background:#99ff99;" readonly value="<?php echo $id;?>"></td>
  <td> <input type="text" name="paterno" size="5" style="background:#99ff99;" readonly value="<?php echo $apaterno;?>"></td>
  <td> <input type="text" name="materno" size="5" style="background:#99ff99;" readonly value="<?php echo $amaterno;?>"></td>
  <td> <input type="text" name="nomb" size="5" style="background:#99ff99;" readonly value="<?php echo $nombre;?>"></td>
  <td> <input type="text" name="street" size="5" style="background:#99ff99;"  value="<?php echo $calle;?>"></td>
  <td> <input type="text" name="munic" size="5"  style="background:#99ff99;"value="<?php echo $muni;?>"></td>
  <td> <input type="text" name="esta" size="5"  style="background:#99ff99;"value="<?php echo $est;?>"></td>
  <td> <input type="text" name="zip" size="5"  style="background:#99ff99;"value="<?php echo $postal;?>"></td>
  <td> <input type="text" name="mobil" size="5"  style="background:#99ff99;" value="<?php echo $cel;?>"></td>
  <td> <input type="text" name="telcasa" size="5"  style="background:#99ff99;" value="<?php echo $tcasa;?>"></td>
  <td> <input type="text" name="teltrabajo" size="5"  style="background:#99ff99;" value="<?php echo $ttrabajo;?>"></td>
  <td><input type="submit" name="guardar" value="EDITAR INFO" class="button"></td></tr>
</table>

</form>
</div>

<?php

 if(isset($_POST['guardar'])){
 
 $id = $_POST['mat'];

 $act_calle = $_POST['street'];
 $act_muni = $_POST['munic'];
 $act_estado = $_POST['esta'];
 $act_cp = $_POST['zip'];
 $act_cel = $_POST['mobil'];
 $act_tcasa = $_POST['telcasa'];
 $act_ttrabajo = $_POST['teltrabajo'];

 

 
 
 $actualizar = "UPDATE direcciones SET calle = '$act_calle',municipio = '$act_muni',estado = '$act_estado',c_postal = '$act_cp',celular = '$act_cel',tel_casa = '$act_tcasa',tel_trabajo = '$act_ttrabajo' WHERE matricula = '$id'";
$ejecutar=mysqli_query($conn,$actualizar);





}
 


?>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/direc.js"></script>
</body>

</html>


