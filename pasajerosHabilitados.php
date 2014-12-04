<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	<meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Pasajeros Habilitados</title>

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
						Pasajeros habilitados para realizar reservas
					</h1>
				</div>
			</div>
						
		<div class="table-responsive">  
			<table class="table" id="tabla">
				<thead>
					<tr>
						<th>
						  C&oacute;digo Reserva
						</th>
										

						<th>
						  Nombre
						</th>
										

						<th>
						  Apellido
						</th>
										

						<th>
						  DNI
						</th>
										

						<th>
						  Email
						</th>

						<th>
						  Fecha de Nacimiento
						</th>

						<th>
						  Fecha de Reserva
						</th>

						<th>
						  C&oacute;digo de Vuelo
						</th>

						<th>
						  Estado Reserva
						</th>
						
						<th>
						  Categor&iacute;a
						</th>
								  
					</tr>		  
				</thead>
							

				<tbody>
				  <?php  
							
							// Creamos la tabla con los campos que queremos mostrar de las personas
							// Iteramos a través de los resultados que nos devolvió la consulta
							// Le colocamos un id a cada fila para cuando las vayamos a eliminar con jQuery
							// La acción de eliminar la llamamos a través de un evento onclick e indicando el id a eliminar
							$query = "SELECT R.idReserva, R.nombre as nombreReserva, R.apellido as apellidoReserva, R.dni as dniReserva, R.email as emailReserva,
												R.fecha_nacimiento as fecnacReserva, R.fecha_reserva as fecresReserva, R.cod_vuelo as codigoVuelo, ER.descripcion as estadoReserva,
												C.descripcion as categoriaReserva
										FROM reservas R JOIN
											estados_reservas ER ON R.estado = ER.idEstadoReserva JOIN
											categorias C ON R.categoria = C.idCategoria
										WHERE R.estado = 6
										ORDER BY R.idReserva";
							$result = mysqli_query($conexion,$query);
							while($fila = $result->fetch_assoc()){
										echo
										'
				  
				  <tr id="fila_'.$fila['idReserva'].'">
					<td>
					  '.$fila['idReserva'].'
					</td>
											
					
					<td>
					  '.$fila['nombreReserva'].'
					</td>
											
					
					<td>
					  '.$fila['apellidoReserva'].'
					</td>
											
					
					<td>
					  '.$fila['dniReserva'].'
					</td>                        
					
					<td>
					  '.$fila['emailReserva'].'
					</td>
					
					<td>
					  '.$fila['fecnacReserva'].'
					</td>
					
					<td>
					  '.$fila['fecresReserva'].'
					</td>
					
					<td>
					  '.$fila['codigoVuelo'].'
					</td>
					
					<td>
					  '.$fila['estadoReserva'].'
					</td>
					
					<td>
					  '.$fila['categoriaReserva'].'
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