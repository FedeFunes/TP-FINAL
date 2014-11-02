<?php
	
include("conectarBaseDeDatos.php"); 

$idProvincia=$_REQUEST["idProvincia"]; // OBTENGO LA VARIABLE idProvincia

$query = "SELECT * FROM cieloytierra.aeropuertos
INNER JOIN cieloytierra.ciudades
ON aeropuertos.cod_ciudad = ciudades.idCiudad
WHERE cod_provincia = $idProvincia";

$result = mysqli_query($conexion,$query);

while($row = mysqli_fetch_array($result)) {
  echo "<option value='".$row['idAeropuerto']."'>".$row['descripcion']."</option>";
}

mysqli_close($conexion);

?>
