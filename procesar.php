<?php 
	include("conectarBaseDeDatos.php"); 
	
	session_start();
	
	$usuario = 'administrador';
	$password = 12345;
	
	$sql = "SELECT idUsuario from usuarios WHERE usuario = '" . $_POST['usuario'] . "' AND password = '" . $_POST['password'] . "' ";
	echo $sql;
	$consultaUsuario = mysqli_query($conexion, $sql) or die ("Usuario inexistente");		
	$cantFilas = mysqli_num_rows($consultaUsuario);									
	$resultUsuario = mysqli_fetch_array($consultaUsuario);	
	
	mysqli_close($conexion);
	
	if($cantFilas != 1){
		header('location:login.php?mensaje=1');
	}
	else{
	    $_SESSION['usuario'] = $usuario;
	    $_SESSION['password'] = $password;
		header('location:administracion.php');
	}
	
?>