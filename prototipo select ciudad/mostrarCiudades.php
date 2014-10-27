<?php
	
	// get the q parameter from URL
	$provincia=$_REQUEST["provincia"];

	$query = "SELECT * FROM ciudades WHERE /*SEGUN PROVINCIA = $provincia */";
	$result = mysqli_query($con,$query);

	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['descripcion']."'>".$row['descripcion']."</option>";
	}
?>