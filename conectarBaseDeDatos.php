<?php	
	$conexion = mysqli_connect ("localhost:3306", "root") or die ("No se puede conectar con el servidor");
	mysqli_select_db($conexion,"cieloytierra") or die ("No se puede seleccionar la base de datos");
?>
