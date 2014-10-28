<?php
	
include("conectarBaseDeDatos.php"); 

// get the provincia parameter from URL
$provincia=$_REQUEST["provincia"];

$query = "SELECT * FROM ciudades WHERE id_provincia = 1";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)) {
  echo "<option value='".$row['descripcion']."'>".$row['descripcion']."</option>";
}

mysqli_close($con);

?>