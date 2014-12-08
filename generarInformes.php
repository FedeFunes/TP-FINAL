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
										$_SESSION['cantidadVendidas'] = $cantidadPasajesVendidos;
										
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
										$_SESSION['cantidadEconomy'] = $cantidadEconomy;
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Economy:&nbsp;&nbsp;' . $cantidadEconomy . '</th>
												</table>';
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Por Destino - Economy:&nbsp;&nbsp;<span id="valorEconomy"></span></th>
												</table>
												<select class="form-control" name="ciudades" id="selectDestinoEconomy" onChange="mostrarValorEconomy(this.value);">												  	
													<option value="" selected>Seleccionar Ciudad...</option>';
														cargarCiudades();
										echo		'</select><br>';
										
										$queryCantidadPrimera = "SELECT * 
																	FROM reservas
																	WHERE fecha_reserva BETWEEN '2014-11-01' AND '2014-12-31'
																	AND estado IN (2,5)
																	AND categoria = 1";
										
										$resultQueryCantidadPrimera = mysqli_query($conexion, $queryCantidadPrimera);
										$cantidadPrimera = mysqli_num_rows($resultQueryCantidadPrimera);
										$_SESSION['cantidadPrimera'] = $cantidadPrimera;
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Primera:&nbsp;&nbsp;' . $cantidadPrimera . '</th>
												</table>';
										
										echo '<table class="table table-hover">
													<th>Pasajes Vendidos Por Destino - Primera:&nbsp;&nbsp;<span id="valorPrimera"></span></th>
												</table>
												<select class="form-control" name="ciudades" id="selectDestinoPrimera" onChange="mostrarValorPrimera(this.value);">												  	
													<option value="" selected>Seleccionar Ciudad...</option>';
														cargarCiudades();
										echo		'</select><br>';
													
										echo '<table class="table table-hover">
													<th>Ocupaci&oacute;n Por Avi&oacute;n:&nbsp;&nbsp;<span id="valorAvion"></span></th>
												</table>
												<select class="form-control" name="aviones" id="selectAviones" onChange="mostrarValorAviones(this.value)">												  	
													<option value="" selected>Seleccionar Avi&oacute;n...</option>';
														cargarAviones();
										echo 	'</select><br>';
										
										echo '<table class="table table-hover">
													<th>Ocupaci&oacute;n Por Avi&oacute;n y Destino:&nbsp;&nbsp;<span id="valorAvionPorDestino"></span></th>
												</table>
												<select class="form-control" name="ciudadDestinos" id="selectCiudadesDestinos" onChange="mostrarValorAvionesPorDestino(selectAviones.value,this.value);">												  	
													<option value="" selected>Seleccionar Ciudad...</option>';
														cargarCiudades();
										echo		'</select><br>';
										
										$queryReservasCaidas = "SELECT * 
																			FROM reservas
																			WHERE fecha_reserva BETWEEN '2014-11-01' AND '2014-12-31'
																			AND estado = 3";
										
										$resultQueryReservasCaidas = mysqli_query($conexion, $queryReservasCaidas);
										$reservasCaidas = mysqli_num_rows($resultQueryReservasCaidas);
										$_SESSION['reservasCaidas'] = $reservasCaidas;
										
										echo '<table class="table table-hover">
													<th>Reservas Caidas:&nbsp;&nbsp;' . $reservasCaidas . '</th>
												</table>';
										echo '<hr style="margin-bottom:-15px">'
									?>
								
									<?php
										function cargarCiudades(){
											
											include("conectarBaseDeDatos.php");
											$queryCiudades = "SELECT * FROM ciudades ORDER BY descripcion";
											$resultQueryCiudades = mysqli_query($conexion,$queryCiudades);
									
											while($row = mysqli_fetch_array($resultQueryCiudades)) {
											  echo "<option value='".$row['idCiudad']."'>".$row['descripcion']."</option>";
											}
										}
										
										function cargarAviones(){
											
											include("conectarBaseDeDatos.php");
											$queryAviones = "SELECT * FROM aviones ORDER BY modelo";
											$resultQueryAviones = mysqli_query($conexion,$queryAviones);
									
											while($row = mysqli_fetch_array($resultQueryAviones)) {
											  echo "<option value='".$row['idAvion']."'>".$row['modelo']."</option>";
											}
										}
									?>
									
								</div><!-- ./form-group -->
							</form><!-- ./form-horizontal -->
						</div><!-- ./panel-body -->
					</div><!-- ./panel panel-primary -->
				</div><!-- ./col-md-6 col-md-offset-3 -->
			</div><!-- ./row -->
					
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div align="center">
						<h4>Cantidad Total de Reservas - Cantidad Reservas Economy - Cantidad Reservas Primera - Cantidad Reservas Caidas</h4>

						<img src="graficosBarra.php" />
				
						<?php
						echo '<h4>Cantidad de pasajes vendidos por categoría y por destino</h4>';
						echo '<select class="form-control" onChange="mostrarGraficoCategoriaYDestino(this.value);">												  	
								<option value="" selected>Seleccionar Ciudad...</option>';
									cargarCiudades();
						echo '</select><br>';
						?>
						<div id="graficoCategoriaYDestino"></div>

						<?php
						echo '<h4>Ocupación por avión y destino (reservas completadas)</h4>';
						echo '<select class="form-control" onChange="mostrarGraficoAvionYDestino(this.value);">												  	
								<option value="" selected>Seleccionar Ciudad...</option>';
									cargarCiudades();
						echo '</select><br>';
						?>
						<div id="graficoAvionYDestino"></div>
					</div>
				</div><!-- /.col-md-6 col-md-offset-3 -->
			</div><!-- /.row -->			

			<?php include("footer.php") ?>  
				  
		</div><!-- ./container -->
	</body>
</html>