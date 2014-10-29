<?php
	
include("conectarBaseDeDatos.php"); 

$idProvincia=$_REQUEST["idProvincia"]; // OBTENGO LA VARIABLE idProvincia

$query = "SELECT * FROM ciudades WHERE cod_provincia = $idProvincia";
$result = mysqli_query($conexion,$query);

while($row = mysqli_fetch_array($result)) {
  echo "<option value='".$row['idCiudad']."'>".$row['descripcion']."</option>";
}

mysqli_close($conexion);

?>
