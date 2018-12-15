<?php
 
     $opcion = $_GET['opcion'];
   
     require 'conexion.php';

  
     mysqli_query("SET NAMES 'utf8'");


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/sistema.css">
  <link rel="stylesheet" type="text/css" href="css/inscribir.css">
  <title>Sistema de Control Escolar</title>


  
</head>




<body>
  <header>
    <div class="header">
      
      <h1>Sistema Control Escolar BCV</h1>
      
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
            <li><a href="buscar_alumnos.php">Busqueda rápida</a></li>
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
  <div id="cuerpo">
    
     <div id="formulario">
      <form  name="registro" action="registrar.php" method="POST">
        
         <table border="0"  >
          
           <tr>
            <td colspan="3" class="centradoVerde"> Información personal</td>
           </tr>

           <tr>
            <td class="descripcion">Apellido Paterno:</td>
            <td colspan="3" class="valor">
              <input type="text"  name="aPaterno" class="form-input" placeholder="Apellido Paterno" required>
            </td>

           </tr>

           <tr>
            <td class="descripcion">Apellido Materno:</td>
            <td colspan="3" class="valor">
              <input type="text"  name="aMaterno" class="form-input" placeholder="Apellido Materno" required>
            </td>

           </tr>

            <tr>
            <td class="descripcion">Nombre(s):</td>
            <td colspan="3" class="valor">
              <input type="text"  name="nombre" class="form-input"  placeholder="Nombre(s)" required>

            </td>
           </tr>

           

            <tr>
            <td class="descripcion">Sexo:</td>
            <td colspan="3" class="valor">
              <input type="radio"  name= "radioButton" value="hombre" required> Hombre
              <input type="radio"  name= "radioButton" value="mujer" required> Mujer
            </td>
           </tr>

            <tr>
            <td class="descripcion">Fecha de nacimiento:</td>
            <td colspan="3"> <input type="date" name="fecha" required> </td>
           </tr>

            <tr>
            <td class="descripcion">Lugar de nacimiento:</td>
            <td><input type="text"  name= "ciudad" class="form-input" placeholder="Ciudad" required="">
            </td>
            <td class="valor"><select name="estado" id="estado" required>
                <option value=""> Seleccionar estado </option>
                <option value='Aguascalientes'>Aguascalientes </option>
                <option value='Baja California'>Baja California </option>
                <option value='Baja California Sur'>Baja California Sur </option>
                <option value='Campeche'>Campeche </option>
                <option value='Coahuila de Zaragoza'>Coahuila de Zaragoza </option>
                <option value='Colima'>Colima </option>
                <option value='Chiapas'>Chiapas </option>
                <option value='Chihuahua'>Chihuahua </option>
                <option value='Distrito Federal'>Distrito Federal </option>
                <option value='Durango'>Durango </option>
                <option value='Guanajuato'>Guanajuato </option>
                <option value='Guerrero'>Guerrero </option>
                <option value='Hidalgo'>Hidalgo </option>
                <option value='Jalisco'>Jalisco </option>
                <option value='México'>México </option>
                <option value='Michoacán de Ocampo'>Michoacán de Ocampo </option>
                <option value='Morelos'>Morelos </option>
                <option value='Nayarit'>Nayarit </option>
                <option value='Nuevo León'>Nuevo León </option>
                <option value='Oaxaca'>Oaxaca </option>
                <option value='Puebla'>Puebla </option>
                <option value='Querétaro'>Querétaro </option>
                <option value='Quintana Roo'>Quintana Roo </option>
                <option value='San Luis Potosí'>San Luis Potosí </option>
                <option value='Sinaloa'>Sinaloa </option>
                <option value='Sonora'>Sonora </option>
                <option value='Tamaulipas'>Tamaulipas </option>
                <option value='Tlaxcala'>Tlaxcala </option>
                <option value='Veracruz de Ignacio de la Llave'>Veracruz de Ignacio de la Llave </option>
                <option value='Yucatán'>Yucatán </option>
                <option value='Zacatecas'>Zacatecas </option></select></td>
            </tr>

        
            
            <tr>
            <td class="descripcion">C.U.R.P.</td>
            <td colspan="3"><input type="text"  name= "curp" class="form-input" placeholder="C.U.R.P" maxlength="18" required >
            </td>
            </tr>
          
            <tr>
            <td class="descripcion">Domicilio Particular:</td>
            <td colspan="3" class="valor">
              <input type="text"  name="domicilio" class="form-input" placeholder="Domicilio Particular" required>
            </td>
           </tr>

           <tr>
            <td class="descripcion">Municipio y estado:</td>
            <td><input type="text"  name= "municipio" class="form-input" placeholder="Municipio" required>
            </td>
            <td><select name="estado_dom" id="estado" required>
                <option value=""> Seleccionar estado </option>
                <option value='Aguascalientes'>Aguascalientes </option>
                <option value='Baja California'>Baja California </option>
                <option value='Baja California Sur'>Baja California Sur </option>
                <option value='Campeche'>Campeche </option>
                <option value='Coahuila de Zaragoza'>Coahuila de Zaragoza </option>
                <option value='Colima'>Colima </option>
                <option value='Chiapas'>Chiapas </option>
                <option value='Chihuahua'>Chihuahua </option>
                <option value='Distrito Federal'>Distrito Federal </option>
                <option value='Durango'>Durango </option>
                <option value='Guanajuato'>Guanajuato </option>
                <option value='Guerrero'>Guerrero </option>
                <option value='Hidalgo'>Hidalgo </option>
                <option value='Jalisco'>Jalisco </option>
                <option value='México'>México </option>
                <option value='Michoacán de Ocampo'>Michoacán de Ocampo </option>
                <option value='Morelos'>Morelos </option>
                <option value='Nayarit'>Nayarit </option>
                <option value='Nuevo León'>Nuevo León </option>
                <option value='Oaxaca'>Oaxaca </option>
                <option value='Puebla'>Puebla </option>
                <option value='Querétaro'>Querétaro </option>
                <option value='Quintana Roo'>Quintana Roo </option>
                <option value='San Luis Potosí'>San Luis Potosí </option>
                <option value='Sinaloa'>Sinaloa </option>
                <option value='Sonora'>Sonora </option>
                <option value='Tamaulipas'>Tamaulipas </option>
                <option value='Tlaxcala'>Tlaxcala </option>
                <option value='Veracruz de Ignacio de la Llave'>Veracruz de Ignacio de la Llave </option>
                <option value='Yucatán'>Yucatán </option>
                <option value='Zacatecas'>Zacatecas </option></select></td>
            </tr>

             <tr>
            <td class="descripcion">Código Postal:</td>
            <td colspan="3">
              <input type="text"  name= "cp" class="form-input" placeholder="C.P." required>
            </td>
           </tr>

          <tr>
            <td class="descripcion">Teléfono:</td>
            <td>
              <input type="text"  name= "celular" class="form-input" maxlength="50" size="10" placeholder="(614) celular" required>
            </td>
           </tr>
             <tr>
            <td> </td>
            <td>
              <input type="text"  name= "t_casa" class="form-input" maxlength="50" size="10" placeholder="(614) casa" required>
            </td>
           </tr>
            <td> </td>
            <td>
              <input type="text"  name= "t_trabajo" class="form-input" maxlength="50" size="10" placeholder="(614) trabajo" required>
            </td>
           </tr>

           <tr>
            <td colspan="3" class="centradoRosa"> Escolaridad</td>
           </tr>

           <tr>
            <td class="descripcion">Periódo:</td>
            <td colspan="3">
              <select name="periodo" id="periodo" required="">
              <option value="0">Seleccionar período </option>
              <option value=a>Enero-Abril </option>
              <option value=b>Mayo-Agosto </option>
              <option value=c>Septiembre-Diciembre </option>
            </select>
            </td>
           </tr>

            <tr>
            <td  class="descripcion">Grado:</td>
            <td>
              <input type="text"  name= "grado" class="form-input" maxlength="1" size="1" placeholder="1-6" required>
            </td>
            
           </tr>

           <tr>
            <td class="descripcion">Turno:</td>
              
           <td>
              <select name="turno" id="turno" required="">
              <option value=”0”>Seleccionar modalidad </option>
              <option value=1>1-MAT </option>
              <option value=2>2-VESP </option>
              <option value=3>3-SAB </option></select>
            </td>
           </tr>



            <tr>
            <td valign="top" class="descripcion">Documentos:</td>
            <td > Acta de nacimiento </td>
           
            <td><select name="acta" id="acta" >
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>

            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Certificado de Secundaria </td>
           
             <td><select name="certsec" id="certsec" >
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Constancia o Kardex </td>
           
             <td><select name="kardex" id="kardex" >
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Certificado Parcial </td>
           
            <td><select name="parcial" id="parcial">
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Predictamen </td>
           
            <td><select name="predictamen" id="predictamen" >
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Equivalencia </td>
           
            <td><select name="equivalencia" id="equivalencia" >
                <option value="o"> original </option>
                 <option value="c"> copia </option>
                  <option value="n"> no aplica </option>
                   <option value="p"> pendiente </option></select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
             <td > Clave CURP</td>
           
            <td><select name="ccurp" id="ccurp" >
                <option value="e"> entregado </option>
                 <option value="p"> pendiente </option> </select></td>
            </tr>
            <tr>
            <td valign="top" class="descripcion"></td>
            <td > Fotografias </td>
            <td>
               <select name="fotos" id="fotos" >
                <option value="e"> entregado </option>
                 <option value="p">pendiente </option></select></td>
            </tr>


           <tr>
           <td colspan="3" class="centradoGris" > <input type="submit"  name="submit" class="btn-submit"  value="Registrar alumno"></td>
           </tr>

         </table>


      </form>


     </div>



  </div>

</body>
</html>