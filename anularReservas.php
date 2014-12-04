<?php
	session_start();
	include("conectarBaseDeDatos.php");

	$difVentaNoConfirmada = "SELECT DATEDIFF(V.fecha_vuelo,curdate()) * 24 AS diferencia24Horas 
								FROM vuelos V JOIN 
										reservas R ON V.idVuelo = R.cod_vuelo 
								WHERE R.estado = 1";
	
	$diferencia = mysqli_query($conexion, $difVentaNoConfirmada);
	$horasDiferencia = mysqli_fetch_array($diferencia);
	
	echo "".$horasDiferencia['diferencia24Horas']."";
	
	if($horasDiferencia['diferencia24Horas'] <= 24){
		$actualizarEstadoReservasNoConfirmadas = "UPDATE reservas
													SET estado = 3
													WHERE estado = 1 
														AND cod_vuelo IN (SELECT idVuelo 
																			FROM vuelos 
																			WHERE (DATEDIFF(fecha_vuelo,curdate()) * 24) <= 24)";
		
		$darDeBaja = mysqli_query($conexion, $actualizarEstadoReservasNoConfirmadas);
		
		$mensajeAnuladas = "Las Reservas con estado Pendiente de Pago han sido anuladas";
		echo "<script type='text/javascript'>alert('$mensajeAnuladas');</script>";
		
		$vuelosDadosDeBaja = "SELECT idVuelo 
								FROM vuelos 
								WHERE (DATEDIFF(fecha_vuelo,curdate()) * 24) <= 24";
		
		$resultVuelosDadosDeBaja = mysqli_query($conexion, $vuelosDadosDeBaja);
		while($row = mysqli_fetch_array($resultVuelosDadosDeBaja)) {
			$idVuelo = $row['idVuelo'];
		
			$queryCantidadBajasPrimera = "SELECT COUNT(*) as cantBajasPrimera
											FROM reservas 
											WHERE estado = 3 
												AND cod_vuelo = $idVuelo
												AND categoria = 1";
			
			$cantBajasPrimera = mysqli_query($conexion, $queryCantidadBajasPrimera);
			$rowPrimera = mysqli_fetch_assoc($cantBajasPrimera);
			
			$actualizarEstadoReservasPrimeraEnListaDeEspera = "UPDATE reservas 
																SET estado = 6 
																WHERE idReserva IN (SELECT * FROM 
																						(SELECT idReserva
																							FROM reservas
																							WHERE estado = 4
																								AND cod_vuelo = $idVuelo
																								AND categoria = 1 
																								LIMIT ".$rowPrimera['cantBajasPrimera'].") listaDeEsperaPrimera)";
																							
			$updateReservasPrimera = mysqli_query($conexion, $actualizarEstadoReservasPrimeraEnListaDeEspera);
			
			$queryCantidadBajasEconomy = "SELECT COUNT(*) as cantBajasEconomy
											FROM reservas 
											WHERE estado = 3 
												AND cod_vuelo = $idVuelo
												AND categoria = 2";
											
			$cantBajasEconomy = mysqli_query($conexion, $queryCantidadBajasEconomy);
			$rowEconomy = mysqli_fetch_assoc($cantBajasEconomy);
			
			$actualizarEstadoReservasEconomyEnListaDeEspera = "UPDATE reservas 
																SET estado = 6 
																WHERE idReserva IN (SELECT * FROM 
																						(SELECT idReserva
																							FROM reservas
																							WHERE estado = 4
																								AND cod_vuelo = $idVuelo
																								AND categoria = 2 
																								LIMIT ".$rowEconomy['cantBajasEconomy'].") listaDeEsperaEconomy)";
			
			$updateReservasEconomy = mysqli_query($conexion, $actualizarEstadoReservasEconomyEnListaDeEspera);
		}
		
		/*$mailListaDeEspera = "SELECT email FROM reservas WHERE estado = 4 ORDER BY idReserva";
		$para = $mailListaDeEspera;
		$titulo = 'Habilitaci&oacute;n de reserva de pasajes';
		$mensaje = 'Usted ha sido habilitado para realizar una reserva en la fecha seleccionada';
		$mensaje = wordwrap($mensaje, 70, "/r/n");
		//$cabeceras = 'De: administrador@cieloytierra.com.ar' . "\r\n" .
		mail($para, $titulo, $mensaje);*/
		
		header('location:pasajerosHabilitados.php');
	}
	else{
		alert('No hay Reservas con estado Pendiente de Pago para actualizar');
	}
?>