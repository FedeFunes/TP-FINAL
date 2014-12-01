<?php 
	include("conectarBaseDeDatos.php"); 
	session_start();
	
	if(!isset($_SESSION['usuario'])){
		header('location:login.php?mensaje=1');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	<meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Informes Semanales</title>

    <?php include("libreriasCSS.php"); ?>
    
    </head>
    <body> 
		<div class="container">
			<?php include("navBar.php") ?>
			<?php include("libreriasJS.php"); ?>
			<div class="row">
                <div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary" >
						<div class="panel-heading">
							<div class="panel-title">
								Informes de Gesti&oacute;n Semanal
							</div><!-- ./panel-title -->
						</div><!-- ./panel-heading -->
				
						<div class="panel-body" >
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<?php
										$queryCantidadPasajesVendidos = "SELECT * 
																			FROM reservas
																			WHERE fecha_reserva BETWEEN '2014-11-01' AND '2014-12-31'
																			AND estado IN (2,5)";
										
										$resultQueryCantidadPasajesVendidos = mysqli_query($conexion, $queryCantidadPasajesVendidos);
										$cantidadPasajesVendidos = mysqli_num_rows($resultQueryCantidadPasajesVendidos);
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos:&nbsp;&nbsp;' . $cantidadPasajesVendidos . '</th>
												</table>';
										
										$queryCantidadEconomy = "SELECT * 
																	FROM reservas
																	WHERE fecha_reserva BETWEEN '2014-11-01' AND '2014-12-31'
																	AND estado IN (2,5)
																	AND categoria = 2";
										
										$resultQueryCantidadEconomy = mysqli_query($conexion, $queryCantidadEconomy);
										$cantidadEconomy = mysqli_num_rows($resultQueryCantidadEconomy);
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Economy:&nbsp;&nbsp;' . $cantidadEconomy . '</th>
												</table>';
										
										$queryCantidadPrimera = "SELECT * 
																	FROM reservas
																	WHERE fecha_reserva BETWEEN '2014-11-01' AND '2014-12-31'
																	AND estado IN (2,5)
																	AND categoria = 1";
										
										$resultQueryCantidadPrimera = mysqli_query($conexion, $queryCantidadPrimera);
										$cantidadPrimera = mysqli_num_rows($resultQueryCantidadPrimera);
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Primera:&nbsp;&nbsp;' . $cantidadPrimera . '</th>
												</table>';
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Por Destino</th>
												</table>
												<select class="form-control" name="ciudades" id="ciudades" onChange="mostrarValorDestino(idCiudad)">												  	
													<option value="" selected>Seleccionar Ciudad...</option>';
													
										/*echo '<table class="table table-hover">
													<th>Ocupaci&oacute;n Por Avi&oacute;n</th>
												</table>
												<select class="form-control" name="aviones" id="aviones" onChange="mostrarValorAvion(idAvion)">												  	
													<option value="" selected>Seleccionar Avi&oacute;n...</option>';*/
									?>
								
									<?php
										$queryCiudades = "SELECT * FROM ciudades ORDER BY descripcion";
										$resultQueryCiudades = mysqli_query($conexion,$queryCiudades);
								
										while($row = mysqli_fetch_array($resultQueryCiudades)) {
										  echo "<option value='".$row['idCiudad']."'>".$row['descripcion']."</option>";
										}
										
										$queryAviones = "SELECT * FROM aviones ORDER BY modelo";
										$resultQueryAviones = mysqli_query($conexion,$queryAviones);
								
										while($row = mysqli_fetch_array($resultQueryAviones)) {
										  echo "<option value='".$row['idAvion']."'>".$row['modelo']."</option>";
										}
									?>
								</div><!-- ./form-group -->
							</form><!-- ./form-horizontal -->
						</div><!-- ./panel-body -->
					</div><!-- ./panel panel-primary -->
				</div><!-- ./col-md-6 col-md-offset-3 -->
			</div><!-- ./row -->
		
			<script type="text/javascript">
				function mostrarValorDestino(idCiudad){
					
					$queryCiudad = "SELECT C.idCiudad
										FROM reservas R JOIN
										vuelos V ON R.cod_vuelo = V.idVuelo JOIN
										programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
										aeropuertos A ON PV.cod_aeropuerto_destino = A.idAeropuerto JOIN
										ciudades C ON A.cod_ciudad = C.idCiudad";
					printf($queryCiudad);
					
					if(idCiudad === ){
						$sql = "SELECT DISTINCT C.descripcion, COUNT(*) as 'Pasajes Vendidos Destino'
								FROM reservas R JOIN
										vuelos V ON R.cod_vuelo = V.idVuelo JOIN
										programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
										aeropuertos A ON PV.cod_aeropuerto_destino = A.idAeropuerto JOIN
										ciudades C ON A.cod_ciudad = C.idCiudad
								WHERE R.estado = 2
								GROUP BY C.idCiudad, C.descripcion
								ORDER BY C.descripcion";
						
						$result = mysqli_query($conexion,$sql);
					}
				}
			</script>
			
			<?php include("footer.php") ?>  
				  
		</div><!-- ./container -->
	</body>
</html>