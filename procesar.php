<?php 
	include("conectarBaseDeDatos.php"); 
	
	$usuario = 'administrador';
	$password = '12345';
	
	$sql = "SELECT idUsuario from usuarios WHERE usuario = '" . $usuario . "' AND password = '" . $password . "' LIMIT 1";
	$consultaUsuario = mysql_query( $sql, $conexion) or die ("Usuario inexistente");		
	$cantFilas = mysql_num_rows($consultaUsuario);									
	$resultUsuario = mysql_fetch_array($consultaUsuario);

	mysql_close($conexion);	
	
	if($cantFilas != 1){
		alert('Usuario/Contrase&ntilde;a incorrecto');
		header('location:login.php?mensaje=1');
	}
	else{
	    $_SESSION['usuario'] = $usuario;
	    $_SESSION['password'] = $password;
		header('location:administracion.php');
	}

?>