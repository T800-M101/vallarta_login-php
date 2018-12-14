<?php

require 'conexion.php';

$alert = '';
session_start();



if(!empty($_SESSION['active'])){

header('location:sistema.php');

}else{

if(!empty($_POST)){

  if(empty($_POST['usuario']) || empty($_POST['password'])){
    
    $alert = 'Ingrese usuario y contraseña';

  }else{
  

  	$user = $_POST['usuario'];
  	$pass = $_POST['password'];


  	$result=mysqli_query($conn,"SELECT * FROM usuarios where usuario = '$user' AND pass='$pass'");

    $rows=mysqli_num_rows($result);
    


  	if($rows > 0){


  	
  		$_SESSION['active'] = true;
  		$_SESSION['id_user'] = $data['id_usuario'];
  		$_SESSION['user'] = $data['usuario'];
  		

  		header('location:sistema.php');

  	}else{

  		$alert = "El usuario o contraseña es incorrecto";
  		session_destroy();
  		
  	}

   }
 }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina de Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

	<div class="contenedor">
		<form  class="form" method="POST">
			<div class="form-header">
				<h1 class="form-title">BCV <span>- Control Escolar</span></h1>
			</div>
			
			<label for="usuario" class="form-label">Usuario:</label>
			<input type="text"  name="usuario" class="form-input" placeholder="Usuario">
			

			<label for="password" class="form-label">Contraseña:</label>
			<input type="password"  name= "password" class="form-input" placeholder="Contraseña">
			<div class = "alert"><?php echo isset($alert)? $alert : ''; ?></div>

			<input type="submit" class="btn-submit" value="Iniciar Sesión">
		</form>
  </div>

	   <div class="logo"><img src="img/logo.jpg"></div>

</body>
</html>