<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/b_alumnos.css"> 
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
  <title>Documentos Pendientes</title>
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
  <option value="">Seleccionar reporte</option>  
  <option value="todo">Todo</option>  
  <option value="equivalencia">Equivalencia</option>  
  <option value="predictamen">Predictamen</option></select> </form>
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
       if(isset($_POST['caja_busqueda'])){
       $id=$_POST['caja_busqueda'];

       $consulta = "SELECT  info.matricula,info.a_paterno, info.a_materno,info.nombre, doc.acta_nac,doc.cert_sec,doc.kardex,doc.cert_parcial,doc.predictamen,doc.equivalencia, doc.clave_curp,doc.fotos FROM informacion_personal info  INNER JOIN documentos doc ON info.matricula = doc.matricula WHERE status=0 AND info.matricula = '$id'";

       $ejecutar = mysqli_query($conn,$consulta);
       $fila=mysqli_fetch_array($ejecutar);

       $matri=$fila['matricula'];
       $apaterno = $fila['a_paterno'];
       $amaterno = $fila['a_materno'];
       $nombre = $fila['nombre'];
       $acta=$fila['acta_nac'];
       $cert_sec=$fila['cert_sec'];
       $kardex=$fila['kardex'];
       $cert_parcial=$fila['cert_parcial'];
       $predictamen=$fila['predictamen'];
       $equivalencia=$fila['equivalencia'];
       $clave_curp=$fila['clave_curp'];
       $fotos=$fila['fotos'];
       
     
    }
     

?>

<br>

<div align="center">
<form method="POST" align=center> 
    <table>
    <tr >
      <th>MATRICULA</th>
      <th>PATERNO</th>
      <th>MATERNO</th>
      <th>NOMBRE</th>
      <th>ACTA</th>
      <th>CERT.SEC.</th>
      <th>KARDEX</th>
      <th>CERT.PARCIAL</th>
      <th>PREDICTAMEN</th>
      <th>EQUIVALENCIA</th>
      <th>CURP</th>
      <th>FOTOS</th>

    </tr>

    <tr>
      <td> <input type="text" name="mat" size="5" style="background:#99ff99;" readonly value="<?php echo $matri;?>"></td>
       <td><input type="text" name="paterno" size="5" style="background:#99ff99;" readonly value="<?php echo $apaterno;?>"></td>
       <td> <input type="text" name="materno" size="5" style="background:#99ff99;" readonly value="<?php echo $amaterno;?>"></td>
           <td><input type="text" name="nomb" size="5" style="background:#99ff99;" readonly value="<?php echo $nombre;?>"></td>
           <td> <input type="text" name="acta" size="5"  style="background:#99ff99;" pattern="[o,c,p]" title="Use minisculas: o,c,p" maxlength="1" value="<?php echo $acta;?>"></td>
             <td>  <input type="text" name="cs" size="5"  style="background:#99ff99;" pattern="[o,c,p]" title="Use minisculas: o,c,p" maxlength="1" value="<?php echo $cert_sec;?>"></td>
              <td>   <input type="text" name="k" size="5"  style="background:#99ff99;" pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $kardex;?>"></td>
               <td> <input type="text" name="cp" size="5"  style="background:#99ff99;" pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $cert_parcial;?>"></td>
                 <td> <input type="text" name="p" size="5"  style="background:#99ff99;" pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $predictamen;?>"></td>
                   <td> <input type="text" name="eq" size="5"  style="background:#99ff99;" pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $equivalencia;?>"></td>
                     <td> <input type="text" name="cc" size="5"  style="background:#99ff99;"  pattern="[e,p]" title="Use minisculas: e,p"maxlength="1" value="<?php echo $clave_curp;?>"></td>
                       <td> <input type="text" name="f" size="5"  style="background:#99ff99;"  pattern="[e,p]" title="Use minisculas: e,p"maxlength="1" value="<?php echo $fotos;?>"></td>
 
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
 $act_acta = $_POST['acta'];
 $act_cs = $_POST['cs'];
 $act_k = $_POST['k'];
 $act_cp = $_POST['cp'];
 $act_p = $_POST['p'];
 $act_eq = $_POST['eq'];
 $act_cc = $_POST['cc'];
 $act_f = $_POST['f'];
   



 

 
 
    $actualizar = "UPDATE documentos SET acta_nac = '$act_acta',cert_sec = '$act_cs',kardex = '$act_k',cert_parcial = '$act_cp',predictamen = '$act_p',equivalencia = '$act_eq',clave_curp= '$act_cc',fotos = '$act_f' WHERE matricula = '$id'";
   $ejecutar=mysqli_query($conn,$actualizar);

if($ejecutar){

$consulta = "SELECT  matricula,acta_nac,cert_sec,kardex,cert_parcial,predictamen,equivalencia,clave_curp,fotos,status FROM  documentos  WHERE matricula = '$id'";

$ejecutar = mysqli_query($conn,$consulta);

$fila= mysqli_fetch_array($ejecutar);

$matricula = $fila['matricula'];
$acta = $fila['acta_nac'];
$cert_sec = $fila['cert_sec'];
$kardex = $fila['kardex'];
$cert_parcial = $fila['cert_parcial'];
$predictamen = $fila['predictamen'];
$equivalencia = $fila['equivalencia'];
$ccurp = $fila['clave_curp'];
$fotos = $fila['fotos'];
$status = $fila['status'];
$stat="";
$na="n";
$original = "o";
$entregado="e";





if(($acta==$original || $acta==$na) and ($cert_sec==$original || $cert_sec==$na) and ($kardex==$original || $kardex==$na) and ($cert_parcial==$original || $cert_parcial==$na) and ($predictamen==$original || $predictamen==$na)  and ($equivalencia==$original || $equivalencia==$na) and ($ccurp==$entregado) and ($fotos==$entregado)){

                     $stat="1";

                    }else{
                      $stat="0";
                    }

 $eliminar = "UPDATE  documentos SET status='$stat' WHERE matricula = '$id'";
 $query = mysqli_query($conn,$eliminar);

}




}
 


?>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/reporte_docs.js"></script>
</body>

</html>


