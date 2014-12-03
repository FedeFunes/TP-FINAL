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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Administraci&oacute;n</title>

    <?php include("libreriasCSS.php"); ?>
    
    </head>
    <body>
		<div class="wrap">
			<div class="container">
				<?php include("navBar.php") ?>
				<div class="row">
	                <div class="col-md-4 col-md-offset-4">
						<div class="panel panel-primary" >
							<div class="panel-heading">
								<div class="panel-title">
									Actualizaci&oacute;n de Reservas
								</div><!-- ./panel-title -->
							</div><!-- ./panel-heading -->

							<div class="panel-body" >
								<form action="anularReservas.php" method="post">
									<input type="submit" class="btn btn-default btn-block" value="Dar de Baja">
								</form>
								<br>
								<form>
									<input type="button" class="btn btn-default btn-block" value="Generar Informe de Gesti&oacute;n" onClick="parent.location='generarInformes.php'">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.container -->
		</div><!-- /.wrap -->
	<?php
		/*function darDeBajaReservas(){
			include("conectarBaseDeDatos.php"); 
			
			$difVentaNoConfirmada = "SELECT DATEDIFF(V.fecha_partida,curdate()) * 24 AS diferencia24Horas 
										FROM vuelos V JOIN 
												reservas R ON V.idVuelo = R.cod_vuelo 
										WHERE R.estado = 1";
			
			if($difVentaNoConfirmada <= 24){
				$actualizarEstadoReservasNoConfirmadas = "UPDATE reservas SET estado = 3 WHERE estado = 1";
				echo 'SELECT * FROM reservas';
				alert('Las Reservas con estado Pendiente de Pago han sido anuladas.');
				
				$listaDeEspera = "SELECT email FROM reservas WHERE estado = 4";
				$para = $listaDeEspera;
				$titulo = 'Habilitaci&oacute;n de reserva de pasajes';
				$mensaje = 'Usted ha sido habilitado para realizar una reserva en la fecha seleccionada';
				$mensaje = wordwrap($mensaje, 70, "/r/n");
				$cabeceras = 'De: administrador@cieloytierra.com.ar' . "\r\n" .
				mail($para, $titulo, $mensaje, $cabeceras);
			}
			
		}*/
	?>
		
    <?php include("footer.php") ?>

    <?php include("libreriasJS.php"); ?>

    </body>
</html>
