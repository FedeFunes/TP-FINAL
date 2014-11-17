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
		<div class="container">
			<?php include("navBar.php") ?>
			<div class="row">
                <div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary" >
						<div class="panel-heading">
							<div class="panel-title">
								Actualizaci&oacute;n de Reservas
							</div><!-- ./panel-title -->
						</div><!-- ./panel-heading -->

						<div class="panel-body" >
							<button type="button" class="btn btn-default" onclick="darDeBajaReservas()">Dar de Baja</button>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container -->
		
	<?php
		function darDeBajaReservas(){
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
			
		}
	?>
		
    <?php include("footer.php") ?>

    <?php include("libreriasJS.php"); ?>

    </body>
</html>
