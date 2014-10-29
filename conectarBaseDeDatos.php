<?php
	session_start();
			
	$conexion = mysql_connect ("localhost:3306", "root", "") or die ("No se puede conectar con el servidor");
	mysql_select_db("cieloytierra") or die ("No se puede seleccionar la base de datos");
	
	mysql_close($conexion);
/*$con=mysqli_connect("localhost","root","","cieloytierra");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/
?>
