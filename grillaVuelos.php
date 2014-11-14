<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	<meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Programaci&oacute;n de Vuelos</title>

    <?php include("libreriasCSS.php"); ?>
    
    </head>
    <body>
		<?php 
		include("conectarBaseDeDatos.php");
		session_start();
		?>
		   
		<div class="container">
			<?php include("navBar.php") ?>
			<?php include("libreriasJS.php"); ?>
			
			<div class="panel panel-primary">
				<div class="panel-heading">					
					<h1>
						Programaci&oacute;n de Vuelos
					</h1>
				</div>
			</div>
						
		<div class="table-responsive">  
			<table class="table" id="tabla">
				<thead>
					<tr>
						<th>
						  Id
						</th>
										

						<th>
						  Aeropuerto Origen
						</th>
										

						<th>
						  Ciudad Origen
						</th>
										

						<th>
						  Aeropuerto Destino
						</th>
										

						<th>
						  Ciudad Destino
						</th>

						<th>
						  Precio Primera
						</th>

						<th>
						  Precio Economy
						</th>

						<th>
						  Vuelos D&iacute;as
						</th>

						<th>
						  Hora Partida
						</th>
								  
					</tr>		  
				</thead>
							

				<tbody>
				  <?php  
							
							// Creamos la tabla con los campos que queremos mostrar de las personas
							// Iteramos a través de los resultados que nos devolvió la consulta
							// Le colocamos un id a cada fila para cuando las vayamos a eliminar con jQuery
							// La acción de eliminar la llamamos a través de un evento onclick e indicando el id a eliminar
							$query = "SELECT PV.idProgramacionVuelo, A1.descripcion as aeropuertoOrigen, C1.descripcion as ciudadOrigen, A2.descripcion as aeropuertoDestino, 
										C2.descripcion as ciudadDestino, PV.precio_primera as precioPrimera, PV.precio_economy as precioEconomy,
										TRIM(CONCAT((CASE WHEN vuelo_lunes THEN 'Lunes' ELSE '' END),(CASE WHEN vuelo_martes THEN ' Martes' ELSE '' END),
                                        (CASE WHEN vuelo_miercoles THEN ' Miercoles' ELSE '' END),(CASE WHEN vuelo_jueves THEN ' Jueves' ELSE '' END),
										(CASE WHEN vuelo_viernes THEN ' Viernes' ELSE '' END),(CASE WHEN vuelo_sabado THEN ' Sabado' ELSE '' END),
										(CASE WHEN vuelo_domingo THEN ' Domingo' ELSE '' END))) as diasVuelos, TIME_FORMAT(PV.hora_partida,'%H:%i') as horaPartida
										FROM programacionvuelos PV JOIN 
											aeropuertos A1 ON A1.idAeropuerto = PV.cod_aeropuerto_origen JOIN 
											aeropuertos A2 ON A2.idAeropuerto = PV.cod_aeropuerto_destino JOIN 
											ciudades C1 ON C1.idCiudad = A1.cod_ciudad JOIN 
											ciudades C2 ON C2.idCiudad = A2.cod_ciudad JOIN 
											provincias P1 ON C1.cod_provincia = P1.idProvincia JOIN
											provincias P2 ON C2.cod_provincia = P2.idProvincia
										ORDER BY PV.idProgramacionVuelo;";
							$result = mysqli_query($conexion,$query);
							while($fila = $result->fetch_assoc()){
										echo
										'
				  
				  <tr id="fila_'.$fila['idProgramacionVuelo'].'">
					<td>
					  '.$fila['idProgramacionVuelo'].'
					</td>
											
					
					<td>
					  '.$fila['aeropuertoOrigen'].'
					</td>
											
					
					<td>
					  '.$fila['ciudadOrigen'].'
					</td>
											
					
					<td>
					  '.$fila['aeropuertoDestino'].'
					</td>                        
					
					<td>
					  '.$fila['ciudadDestino'].'
					</td>
					
					<td>
					  $ '.$fila['precioPrimera'].'
					</td>
					
					<td>
					  $ '.$fila['precioEconomy'].'
					</td>
					
					<td>
					  '.$fila['diasVuelos'].'
					</td>
					
					<td>
					  '.$fila['horaPartida'].'
					</td>
										  
				  </tr>';
								  } 
							  ?>
							  
				</tbody>
						  
			</table>
		</div>
		
		<?php include("footer.php") ?>  
				  
		</div>
	</body>
</html>