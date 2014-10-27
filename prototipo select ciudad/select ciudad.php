<?php
	
	// get the q parameter from URL
	$q=$_REQUEST["q"];

	$query = "SELECT * FROM ciudades WHERE /*SEGUN PROVINCIA = q */";
	$result = mysqli_query($con,$query);

	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['descripcion']."'>".$row['descripcion']."</option>";
	}
?>