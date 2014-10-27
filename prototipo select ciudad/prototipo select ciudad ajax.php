<html>
<head>
</head>

<body>
	<form method="post" action="#.php"> 
		
		<div>Seleccione Provincia</div>

		<div>
			<select name="provincia" onchange="mostrarCiudades(this.value)"> <!-- cuando selecciona una provincia envia el valor selecionado -->
	 			
	 			<option value="">Provincia</option>

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
			<select name="ciudad" id="selectCiudad"> 	
			
			<option value="">Ciudad:</option>
			
			<!-- AJAX EJECUTARÍA EL PHP ACA -->

			</select>  
		</div>


	</form>
</body>
</html>