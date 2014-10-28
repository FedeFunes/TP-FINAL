<!DOCTYPE html>				
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>CYT Aerol&iacuteneas</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	
	<!-- jQuery UI CSS -->
	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.css">
	
	<!-- CSS PROPIO -->
	<link rel="stylesheet" href="css/estilo.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="container">

		<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<nav class="navbar navbar-default fixed-top" role="navigation">
					  	<div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        	<span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
						     	</button>
						      	<a class="navbar-brand" href="index.html">
									<img src="imgs/logo.png" width="40px" height="40px" />
								</a>
						    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						    <ul class="nav nav-pills">
					      	 	<li><a href="index.php">Inicio</a></li>
						        <li><a href="miReserva.php">Mi Reserva</a></li>
						        <li class="active"><a href="vuelos.php">Vuelos</a></li>
						        <li><a href="contacto.php">Contacto</a></li>
						    </ul>
					        <ul class="nav navbar-nav navbar-right">
				            	<a href="#"><li><span class="glyphicon glyphicon-user"></span> Administrador</a></li>  
				            </ul>
					    </div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
<!-- Sección Elegir-Vuelo -->
			       	<div class="col-md-6">
						<div class="panel panel-primary">
 							<div class="panel-heading">
						    	<h3 class="panel-title">Vuelos</h3>
						  	</div>	
 							 <div class="panel-body">	
								
 							 	<!-- Form - Vuelos -->
								<form role="form">
							  		
							  		<!-- Radio: Ida y Vuelta -->
							  		<div class="form-group">
								  		<label class="radio-inline">
										 	<input type="radio" name="tipo_viaje" id="inlineRadio1" value="ida_vuelta" checked="checked" onclick="mostrar_campo_fecha_vuelta();"> Ida y Vuelta
										</label>
									
									<!-- Radio: Solo Ida -->	
										<label class="radio-inline">
										  	<input type="radio" name="tipo_viaje" id="inlineRadio2" value="ida" onclick="ocultar_campo_fecha_vuelta();"> Solo Ida
										</label>
							  		</div>
							  		
							  		<!-- Origen -->
							  		<label>Origen</label>
							  		<span class="help-block" style="font-size:12px;margin-top:0px;">Elija Provincia y Ciudad</span>
							  		<div class="row">
									 	<div class="col-md-6">
									 		<div class="form-group">
										  		<select class="form-control">
												  	<option value="provincia1">Provincia 1</option>
												</select>
											</div>
									 	</div>
									 	<div class="col-md-6">
									 		<div class="form-group">
										  		<select class="form-control">
												  	<option value="ciudad1">Ciudad 1</option>
												</select>
											</div>
									 	</div>
								  	</div>

								  	<!-- Destino -->
							  		<label>Destino</label>
							  		<span class="help-block" style="font-size:12px;margin-top:0px;">Elija Provincia y Ciudad</span>
							  		<div class="row">
									 	<div class="col-md-6">
									 		<div class="form-group">
										  		<select class="form-control">
												  	<option value="provincia1">Provincia 1</option>
												</select>
											</div>
									 	</div>
									 	<div class="col-md-6">
									 		<div class="form-group">
										  		<select class="form-control">
												  	<option value="ciudad1">Ciudad 1</option>
												</select>
											</div>
									 	</div>
								  	</div>
								  	
								  	<!-- Categoría -->
								  	<div class="form-group">
								  		<label for="categoria">Categor&iacutea</label>
								  		<select class="form-control" id="categoria">
										  	<option placeholder="Elija categor&iacutea"></option>
										  	<option value="economy">Economy</option>
										  	<option value="primeras">Primera</option>
										</select>
									</div>
									
									<!-- Fechas-->	
									<div class="row">

										<!-- Fecha Partida -->

									 	<div class="col-md-6">
									 		<div class="form-group">
												<label for="datepicker">Partida</label>
												<input type="text" class="form-control" id="fecha_ida" name="fecha_ida" value="dd/mm/aaaa"/>
											</div>
									 	</div>

									 	<!-- Fecha Regreso -->

									 	<div class="col-md-6">
									 		<div class="form-group" id="campo_fecha_vuelta">
												<label for="datepicker">Regreso</label>
												<input type="text" class="form-control" id="fecha_vuelta" name="fecha_vuelta" value="dd/mm/aaaa"/>
											</div>
									 	</div>
								  	</div>
																		
									<!-- Botón "Buscar" -->	
							  		<button type="submit" class="btn btn-primary">Buscar</button>
								</form>