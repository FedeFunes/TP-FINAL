<html>
<head>
</head>

<body>
	<form method="post" action="#.php"> 
		
		<div>Seleccione Provincia</div>

		<div>
			<select name="provincia" onchange="showCustomer(this.value)"> // cuando selecciona una provincia envia el valor
 			
 			<option value="">Select a provincia:</option>

 			<?php
				$query = "SELECT * FROM provincias";
				$result = mysqli_query($con,$query);
		
				while($row = mysqli_fetch_array($result)) {
				  echo "<option value='".$row['descripcion']."'>".$row['descripcion']."</option>";
				}
			?>

			</select>  
		</div>

		<div>Seleccione Ciudad</div>

		<div>
			<select name="ciudad"> 	
			
			<option value="">Select a ciudad:</option>
			
			<?php
				$query = "SELECT * FROM provincias";
				$result = mysqli_query($con,$query);
		
				while($row = mysqli_fetch_array($result)) {
				  echo "<option value='".$row['descripcion']."'>".$row['descripcion']."</option>";
				}
			?>
			
			</select>  
		</div>


	</form>
</body>
</html>