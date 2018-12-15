<?php

require 'conexion.php';


                  date_default_timezone_set("America/Chihuahua");  
                    
                    $fechaEntera = time();
                    $anio=date("Y-m-d");
                  
                    $fechita=$_POST['fecha'];
                    $turno=$_POST['turno'];
                    $periodo=$_POST['periodo'];

                    if($turno==1){

                       $select_mat="SELECT MAX(consec_alumno) FROM consec_mat";
                       $result = mysqli_query($conn,$select_mat);
                       $row=mysqli_fetch_array($result);
                       $high=$row[0]+1;
                       $insert_mat="INSERT INTO consec_mat VALUES ('$high')";
                       $insertar =mysqli_query($conn,$insert_mat);

                    }

                       if($turno==2){

                       $select_vesp="SELECT MAX(consec_alumno) FROM consec_vesp";
                       $result = mysqli_query($conn,$select_vesp);
                       $row=mysqli_fetch_array($result);
                       $high=$row[0]+1;
                       $insert_vesp="INSERT INTO consec_vesp VALUES ('$high')";
                       $insertar =mysqli_query($conn,$insert_vesp);

                    }

                       if($turno==3){

                       $select_sab="SELECT MAX(consec_alumno) FROM consec_sab";
                       $result = mysqli_query($conn,$select_sab);
                       $row=mysqli_fetch_array($result);
                       $high=$row[0]+1;
                       $insert_sab="INSERT INTO consec_sab VALUES ('$high')";
                       $insertar =mysqli_query($conn,$insert_sab);

                    }
                 
                  $matricula_alumno= substr($anio,2,2).$periodo.$turno.$high;

                   $apaterno = $_POST["aPaterno"];
                   $amaterno = $_POST["aMaterno"];
                   $nombre = $_POST["nombre"];
                   $sexo = $_POST["radioButton"];
                   $f_nac = $_POST["fecha"];
                   $l_nac = $_POST["ciudad"];
                   $estado = $_POST["estado"];
                   $curp = $_POST["curp"];

                   


               

                   mysqli_query($conn,"SET CHARACTER SET 'utf8'");
                   mysqli_query($conn,"SET SESSION collation_connection = 'utf8_unicode_ci'");

                 
                   $mat_query = "INSERT INTO `informacion_personal`(`matricula`, `a_paterno`, `a_materno`, `nombre`, `sexo`, `f_nac`, `l_nac`, `estado_nac`, `curp`) VALUES ('$matricula_alumno','$apaterno','$amaterno','$nombre','$sexo','$f_nac','$l_nac','$estado','$curp')";

                   $info = mysqli_query($conn, $mat_query);

                   
             
                   

                   if($info){


                   $calle = $_POST["domicilio"];
                   $municipio = $_POST["municipio"];
                   $estado_dom = $_POST["estado_dom"];
                   $c_postal = $_POST["cp"];
                   $celular = $_POST["celular"];
                   $tel_casa = $_POST["t_casa"];
                   $tel_trabajo = $_POST["t_trabajo"];

                     
                 
                     
                   $dir_query = "INSERT INTO `direcciones`(`matricula`, `calle`, `municipio`, `estado`, `c_postal`, `celular`, `tel_casa`, `tel_trabajo`) VALUES ('$matricula_alumno','$calle','$municipio','$estado_dom','$c_postal','$celular','$tel_casa','$tel_trabajo')";

                   $direc = mysqli_query($conn,$dir_query);

                       

                   }

                   if($direc){

                   
                   $periodo = $_POST["periodo"];
                   $grado = $_POST["grado"];
                   $turno = "";
                   $t=$_POST["turno"];
                   $uno="1";
                   $dos="2";
                   $tres="3";
                   $mat="-MAT";
                   $vesp="-VESP";
                   $sab="-SAB";

                   if($t==$uno){
                    $turno=$uno.$mat;
                   }
                   if($t==$dos){
                    $turno=$dos.$vesp;
                   }
                    if($t==$tres){
                    $turno=$tres.$sab;
                   }
                   
           
                   $status = "A";


                   $esc_query = "INSERT INTO `escolaridad`(`matricula`, `periodo`, `grado`, `turno`,`fecha_ingreso`,`status`) VALUES ('$matricula_alumno','$periodo','$grado','$turno','$anio','$status')";

                   $escolar = mysqli_query($conn,$esc_query);

                   if($escolar){

                    $acta=$_POST['acta'];
                    $cert_sec=$_POST['certsec'];
                    $kardex=$_POST['kardex'];
                    $cert_parcial=$_POST['parcial'];
                    $predictamen=$_POST['predictamen'];
                    $equivalencia=$_POST['equivalencia'];
                    $ccurp=$_POST['ccurp'];
                    $fotos=$_POST['fotos'];
                    $stat="";
                    $na="no aplica";
                    $original = "original";
                    $entregado="entregado";


                    if(($acta==$original || $acta==$na) and ($cert_sec==$original || $cert_sec==$na) and ($kardex==$original || $kardex==$na) and ($cert_parcial==$original || $cert_parcial==$na) and ($predictamen==$original || $predictamen==$na)  and ($equivalencia==$original || $equivalencia==$na) and ($ccurp==$entregado) and ($fotos==$entregado)){

                     $stat="1";

                    }else{
                      $stat="0";
                    }
                       
                    $doc_query = "INSERT INTO `documentos`(`matricula`, `acta_nac`, `cert_sec`, `kardex`,`cert_parcial`,`predictamen`,`equivalencia`,`clave_curp`,`fotos`,`status`) VALUES ('$matricula_alumno','$acta','$cert_sec','$kardex','$cert_parcial','$predictamen','$equivalencia','$ccurp','$fotos','$stat')";

                     $documentos = mysqli_query($conn,$doc_query);

                     echo '<script>
                     alert("ALUMNO REGISTRADO, MATRICULA: '.$matricula_alumno.'");
                      history.back();
                   
                     </script>';

                   }
                 }

                   
                  

                  

                  
                      


                   
                   




?>