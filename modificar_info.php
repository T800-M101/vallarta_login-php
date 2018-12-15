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
  <title>Información Personal</title>
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
  <div align="center" >
    
  <form  method="post">
  <select name="opciones" id="opciones"onchange="return buscar();">  
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

       $consulta="SELECT * FROM informacion_personal WHERE matricula ='$id'";
       $ejecutar = mysqli_query($conn,$consulta);
       $fila=mysqli_fetch_array($ejecutar);
       $id=$fila['matricula'];
       $apaterno = $fila['a_paterno'];
       $amaterno = $fila['a_materno'];
       $nombre = $fila['nombre'];
       $fnacimiento = $fila['f_nac'];
       $lnacimiento = $fila['l_nac'];
       $enacimiento = $fila['estado_nac'];
       $curp = $fila['curp'];

       
     
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
      <th>FECHA NAC.</th>
      <th>LUGAR NAC.</th>
      <th>ESTADO</th>
      <th>C.U.R.P.</th>

    </tr>

    <tr>
      <td> <input type="text" name="mat" size="5" style="background:#99ff99;" readonly value="<?php echo $id;?>"></td>

       <td><input type="text" name="paterno" size="5" style="background:#99ff99;" value="<?php echo $apaterno;?>"></td>
 
       <td> <input type="text" name="materno" size="5" style="background:#99ff99;" value="<?php echo $amaterno;?>"></td>
 
           <td><input type="text" name="nomb" size="5" style="background:#99ff99;" value="<?php echo $nombre;?>"></td>
 
           <td> <input type="text" name="f_naci" size="5"  style="background:#99ff99;"value="<?php echo $fnacimiento;?>"></td>
 
             <td>  <input type="text" name="l_naci" size="5"  style="background:#99ff99;"value="<?php echo $lnacimiento;?>"></td>
 
              <td>   <input type="text" name="e_naci" size="5"  style="background:#99ff99;"value="<?php echo $enacimiento;?>"></td>
 
               <td> <input type="text" name="crp" size="5"  style="background:#99ff99;" value="<?php echo $curp;?>"></td>
 
                   <td>  <input type="submit" name="guardar" value="EDITAR INFO" class="button"></td>
                 </tr>
 
  </table>
 
</form>
</div>
<?php

 if(isset($_POST['guardar'])){
 
 $id = $_POST['mat'];
 $act_apaterno = $_POST['paterno'];
 $act_amaterno = $_POST['materno'];
 $act_nombre = $_POST['nomb'];
 $act_fnacimiento = $_POST['f_naci'];
 $act_lnacimiento = $_POST['l_naci'];
 $act_enacimiento = $_POST['e_naci'];
 $act_curp = $_POST['crp'];

 

 
 
    $actualizar = "UPDATE informacion_personal SET a_paterno = '$act_apaterno',a_materno = '$act_amaterno',nombre = '$act_nombre',f_nac = '$act_fnacimiento',l_nac = '$act_lnacimiento',estado_nac = '$act_enacimiento',curp = '$act_curp' WHERE matricula = '$id'";
   $ejecutar=mysqli_query($conn,$actualizar);





}
 


?>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/info.js"></script>
</body>

</html>


