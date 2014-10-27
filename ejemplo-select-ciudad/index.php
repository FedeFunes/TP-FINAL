<?php include("conectarBaseDeDatos.php"); ?>

<html>
	<head>
	</head>

	<body>
		<form method="post" action="#.php"> 
			
			<div>Seleccione Provincia</div>

			<div>
				<select name="provincia" onChange="mostrarCiudades(this.value);"> <!-- cuando selecciona una provincia envia el valor selecionado -->
		 			
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
				<select name="ciudad" id="selectCiudades"> <!-- LE PONGO UN ID AL ELEMENTO HTML DONDE SE VA A EJECUTAR DENTRO AJAX -->	
				
				<option value="">Ciudad</option>
				
				<!-- ACÁ AJAX EJECUTARÍA EL PHP -->

				</select>  
			</div>

		</form>

		<script type="text/javascript" src="mostrarCiudades.js"></script>

	</body>
</html>