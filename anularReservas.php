<?php
	session_start();
	include("conectarBaseDeDatos.php"); 
	
	$difVentaNoConfirmada = "SELECT DATEDIFF(V.fecha_partida,curdate()) * 24 AS diferencia24Horas 
								FROM vuelos V JOIN 
										reservas R ON V.idVuelo = R.cod_vuelo 
								WHERE R.estado = 1";
	
	if($difVentaNoConfirmada <= 24){
		$actualizarEstadoReservasNoConfirmadas = "UPDATE reservas SET estado = 3 WHERE estado = 1";
		echo 'SELECT * FROM reservas';
		alert('Las Reservas con estado Pendiente de Pago han sido anuladas.');
		
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
		$cabeceras = 'De: administrador@cieloytierra.com.ar' . "\r\n" .
		mail($para, $titulo, $mensaje, $cabeceras);	
	}
?>