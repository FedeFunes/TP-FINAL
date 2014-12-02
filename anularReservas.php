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
																			WHERE (DATEDIFF(fecha_vuelo,curdate()) * 24) <= 24);";
		
		$darDeBaja = mysqli_query($conexion, $actualizarEstadoReservasNoConfirmadas);
		
		echo 'Las Reservas con estado Pendiente de Pago han sido anuladas.';
		
		header('location:index.php');
		
		$cantidadBajas = "SELECT COUNT(*) FROM reservas WHERE estado = 3";
		//$cantidadMaximaPasajesEconomy = "SELECT economy FROM aviones";
		//$cantidadMaximaPasajesPrimera = "SELECT primera FROM aviones";
		//if(){
		//$actualizarEstadoReservasEnListaDeEspera = "UPDATE reservas SET estado = 6 WHERE estado = 4";
		//echo 'SELECT * FROM reservas';
		
		$listaDeEspera = "SELECT email FROM reservas WHERE estado = 4 ORDER BY idReserva";
		$para = $listaDeEspera;
		$titulo = 'Habilitaci&oacute;n de reserva de pasajes';
		$mensaje = 'Usted ha sido habilitado para realizar una reserva en la fecha seleccionada';
		$mensaje = wordwrap($mensaje, 70, "/r/n");
		//$cabeceras = 'De: administrador@cieloytierra.com.ar' . "\r\n" .
		mail($para, $titulo, $mensaje);
		
	}
	else{
		alert('No hay Reservas con estado Pendiente de Pago para actualizar');
	}
?>