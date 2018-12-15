<?php

require 'conexion.php';
if(isset($_GET['editar'])){

$editar_id = $_GET['editar'];


$consulta = "SELECT  matricula,acta_nac,cert_sec,kardex,cert_parcial,predictamen,equivalencia,clave_curp,fotos,status FROM  documentos  WHERE matricula = '$editar_id'";

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
 
}
?>

<br/>

<form method="POST" action ="">
  <table>
      <tr >
      <th>MATRICULA</th>
      <th>ACTA</th>
      <th>CERT.SEC.</th>
      <th>KARDEX</th>
      <th>CERT.PARCIAL</th>
      <th>PREDICTAMEN</th>
      <th>EQUIVALENCIA</th>
      <th>CLAVE CURP</th>
       <th>FOTOS</th>


    </tr>
            <tr>
            <td> <input type="text" name="m" size="5" style="background:#99ff99;" readonly value="<?php echo $matricula;?>"></td>
            <td> <input type="text" name="an" size="5" style="background:#99ff99;" pattern="[o,c,p]" title="Use minisculas: o,c,p" maxlength="1" value="<?php echo $acta;?>"></td>
            <td> <input type="text" name=cs size="5" style="background:#99ff99;" pattern="[o,c,p]" title="Use minisculas: o,c,p" maxlength="1" value="<?php echo $cert_sec;?>"></td>
            <td> <input type="text" name="k" size="5" style="background:#99ff99;" pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $kardex;?>"></td>
            <td> <input type="text" name="cp" size="5" style="background:#99ff99;" pattern="[o,c,n, p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $cert_parcial;?>"></td>
            <td> <input type="text" name="p" size="5" style="background:#99ff99;"  pattern="[o,c,n,p]" title="Use minisculas: o,c,n,p" maxlength="1" value="<?php echo $predictamen;?>"></td>
            <td> <input type="text" name="e" size="5" style="background:#99ff99;"  pattern="[o,c,n, p]" title="Use minisculas: o,c,n,p"maxlength="1" value="<?php echo $equivalencia;?>"></td>
            <td> <input type="text" name="cc" size="5" style="background:#99ff99;"  pattern="[e,p]" title="Use minisculas: e,p"maxlength="1" value="<?php echo $ccurp;?>"></td>
            <td> <input type="text" name="f" size="5" style="background:#99ff99;" pattern="[e,p]" title="Use minisculas: e,p" maxlength="1" value="<?php echo $fotos;?>"></td>
            <td><input type="submit" name="guardar" value="ACTUALIZAR DATOS"class="button"></td></tr>

  </table>

</form>

<?php

if(isset($_POST['guardar'])){

$actualizar_an = $_POST['an'];
$actualizar_cs = $_POST['cs'];
$actualizar_k = $_POST['k'];
$actualizar_cp = $_POST['cp'];
$actualizar_p = $_POST['p'];
$actualizar_e = $_POST['e'];
$actualizar_cc = $_POST['cc'];
$actualizar_f = $_POST['f'];





$actualizar = "UPDATE documentos SET acta_nac = '$actualizar_an',cert_sec = '$actualizar_cs',kardex = '$actualizar_k',cert_parcial = '$actualizar_cp',predictamen = '$actualizar_p',equivalencia = '$actualizar_e',clave_curp='$actualizar_cc', fotos = '$actualizar_f' WHERE matricula = '$editar_id'";

$ejecutar = mysqli_query($conn, $actualizar);



if($ejecutar){

$consulta = "SELECT  matricula,acta_nac,cert_sec,kardex,cert_parcial,predictamen,equivalencia,clave_curp,fotos,status FROM  documentos  WHERE matricula = '$editar_id'";

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

 $eliminar = "UPDATE  documentos SET status='$stat' WHERE matricula = '$editar_id'";
 $query = mysqli_query($conn,$eliminar);

}





   //$eliminar = "DELETE FROM documentos WHERE matricula = '$borrar_id'"; $ejecutar = mysqli_query($conn,$eliminar);
if($query){
 echo "<script> alert('Datos actualizados') </script>";
 echo "<script> window.open('reporte_docs.php') </script>";

}else{

   echo "<script> alert('algo ocurrio') </script>";

}
}



?>






