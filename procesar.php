<?php 
	include("conectarBaseDeDatos.php"); 
	
	$usuario = 'administrador';
	$password = '12345';
	
	$sql = "SELECT idUsuario from usuarios WHERE usuario = " . $_POST['usuario'] . " AND password = " . $_POST['password'];
	$consultaUsuario = mysql_query( $sql, $conexion) or die ("Usuario inexistente");		
	$cantFilas = mysql_num_rows($consultaUsuario);									
	$resultUsuario = mysql_fetch_array($consultaUsuario);
		
	if($resultUsuario['usuario'] == $usuario && $resultUsuario['password'] == $password){
		$_SESSION['usuario'] = $usuario;
		$_SESSION['password'] = $password;
		header('location:administracion.php');	
	}
	else{
		<?php alert('Usuario/Contrase&ntilde;a incorrecto') ?>
		header('location:login.php?mensaje=1');
	}
	 
	mysql_close($conexion);
?>