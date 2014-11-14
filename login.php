<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<?php 
		include("conectarBaseDeDatos.php"); 

		//session_start();
		
		if(isset($_GET['mensaje']) && $_GET['mensaje'] == '1'){
			echo "<script>
				alert('Usuario/Password incorrecto. Vuelva a loguearse');
				</script>";
		}

	?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>CYT Aerol&iacuteneas </title>

		<?php include("libreriasCSS.php") ?>

	</head>
	<body>
		<div class="container">

		<?php include("navBar.php") ?>
		   
			<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-primary" >
					<div class="panel-heading">
						<div class="panel-title">
							Panel de Administraci&oacute;n
						</div><!-- ./panel-title -->
					</div><!-- ./panel-heading -->

					<div class="panel-body" >
						<!--<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>-->
							
						<form class="form-horizontal" action="procesar.php" method="post" role="form">
							<!-- Campos de Login -->
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
								<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuario">                                        
							</div><!-- ./input-group -->
								
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input id="password" type="password" class="form-control" name="password" placeholder="Password">
							</div><!-- ./input-group -->

							<div style="text-align:center" class="form-group">
								<!-- Boton Ingresar -->

								<div class="col-sm-12 controls">
									<button type="submit" class="btn btn-primary btn-lg center-block">
										Ingresar
									</button>
								</div><!-- ./col-sm-12 controls -->
							</div><!-- ./form-group -->

						</form><!-- ./form-horizontal -->
					</div><!-- ./panel-body -->
				</div><!-- ./panel panel-primary -->
			</div><!-- ./mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 -->
		</div><!-- ./container -->
	</body>
</html>
