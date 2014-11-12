<?php
session_start();
include("conectarBaseDeDatos.php");

//obtengo los datos del formulario
$tipoViaje = $_POST["tipoViaje"]; 
$provinciaOrigen = $_POST["provinciaOrigen"];
$ciudadOrigen = $_POST["ciudadOrigen"]; // contiene el código del aeropuerto que esta en esa ciudad
$provinciaDestino = $_POST["provinciaDestino"];
$ciudadDestino = $_POST["ciudadDestino"]; // contiene el código del aeropuerto que esta en esa ciudad
$categoria = $_POST["categoria"];

$fechaIda = $_POST["fechaIda"];
$date = date_create($fechaIda); // retorna un DateTime object de la fecha que le pasé así puedo usar la siguiente función
$diaIda = date_format($date,"l"); // me devuelve el nombre del día de la fecha que le pasé pero en ingles

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create($fechaVuelta);  
$diaVuelta = date_format($date,"l");


// guardo los datos que puedo necesitar en la session 
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen;
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadDestino"] = $ciudadDestino;
$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["categoria"] = $categoria;
$_SESSION["fechaIda"] = $fechaIda;
$_SESSION["fechaVuelta"] = $fechaVuelta;

// variables no seteadas que puedo necesitar en reservarVuelo.php
$_SESSION["idProgramacionVuelo"] = null;
$_SESSION["idVueloIda"] = null;
$_SESSION["idVueloVuelta"] = null;
	// 2 posibles estados: lista de espera/reserva
$_SESSION["estadoVueloIda"] = null; 
$_SESSION["estadoVueloVuelta"] = null; 


// según $diaIda creo la variable $vuelo_dia para usarla en la consulta posterior
switch ($diaIda) {
	case 'Sunday':
		$vuelo_dia = "vuelo_domingo";
 		break;
 	case 'Monday':
		$vuelo_dia = "vuelo_lunes";
 		break;
 	case 'Tuesday':
		$vuelo_dia = "vuelo_martes";
 		break;
 	case 'Wednesday':
		$vuelo_dia = "vuelo_miercoles";
 		break;
 	case 'Thursday':
		$vuelo_dia = "vuelo_jueves";
 		break;
 	case 'Friday':
		$vuelo_dia = "vuelo_viernes";
 		break;
 	case 'Saturday':
		$vuelo_dia = "vuelo_sabado";
 		break;
}


// Consulto en la tabla-programacionvuelos si existe el recorrido ($ciudadOrigen-$ciudadDestino) con $fechaIda 
// y si en el avion que realiza el vuelo existe esa $categoria 
$query = "SELECT * FROM programacionvuelos
INNER JOIN aviones
ON programacionvuelos.cod_avion = aviones.idAvion
WHERE cod_aeropuerto_origen = $ciudadOrigen
AND cod_aeropuerto_destino = $ciudadDestino
AND $vuelo_dia = 1
AND $categoria != 0;";

$result = mysqli_query($conexion,$query);
// mysqli_num_rows() retorna el número de filas que devuelve la consulta
$cantDeFilasDevueltas = mysqli_num_rows($result); 

if ($cantDeFilasDevueltas == 0) { // en caso de que no exista 
		
	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha ida: $fechaIda o no existe la categoria que eligió en el avión que realiza este vuelo.";
	header("location: vueloNoDisponible.php"); 
	die();

} else { // si existe 
			
	$rowProgramacionVuelos = mysqli_fetch_array($result);
	
	// guardo el id en la session 
	$_SESSION["idProgramacionVuelo"] = $rowProgramacionVuelos['idProgramacionVuelo'];  

	// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaIda
	$query = "SELECT * FROM vuelos 
	WHERE (cod_programacion_vuelo = ".$rowProgramacionVuelos['idProgramacionVuelo']."
	AND fecha_vuelo = '$fechaIda')
	AND tipo_viaje = 'ida';"; 

	$result = mysqli_query($conexion,$query);
	$cantDeFilasDevueltas = mysqli_num_rows($result); 

	if ($cantDeFilasDevueltas != 0) { // si existe  
				
		$rowVuelos = mysqli_fetch_array($result); 	

		// guardo el id en la session
		$_SESSION["idVueloIda"] = $rowVuelos['idVuelo'];  

		// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
		$query = "SELECT * FROM reservas 
		WHERE cod_vuelo = ".$rowVuelos['idVuelo']."
		AND categoria = '$categoria';"; 

		$result = mysqli_query($conexion,$query);					
		
		$cantidadDeReservasHechas = mysqli_num_rows($result);

		// Consulto cuál es el limite de reservas en esa categoría en el avión que va a realizar el vuelo
		$query = "SELECT $categoria FROM programacionvuelos
		INNER JOIN aviones
		ON programacionvuelos.cod_avion = aviones.idAvion
		WHERE idProgramacionVuelo = ".$rowProgramacionVuelos['idProgramacionVuelo'].";";

		$result = mysqli_query($conexion,$query);
		$rowLimiteDeReservas = mysqli_fetch_array($result);	
		$limiteDeReservas = $rowLimiteDeReservas[0];
			
		// limite de reservas más la cantidad de reservas que pueden quedar en lista de espera
		$limiteDeReservasMasListaDeEspera = $limiteDeReservas + 10; 
		
		// si la cantidad de reservas hechas supera el limite pero puede quedar en lista de espera
		if ($cantidadDeReservasHechas >= $limiteDeReservas && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
			$_SESSION["estadoVueloIda"] = "lista de espera";
		}

		// si la lista de espera esta llena 
		if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
			$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar en el recorrido con fecha ida: $fechaIda";
			header("location: vueloNoDisponible.php");
			die();
		}

		// esto nunca tiene que pasar
		if ($cantidadDeReservasHechas > $limiteDeReservasMasListaDeEspera) {
			die("Error: CantidadDeReservasHechas ($cantidadDeReservasHechas) > LimiteDeReservaMasListaDeEspera ($limiteDeReservasMasListaDeEspera)");
		}
	}	
}

if($_SESSION["estadoVueloIda"] == null) {
	$_SESSION["estadoVueloIda"] = "pendiente de pago";	
} 


if($tipoViaje = "idaVuelta") {

	// variables que cambian: $diaIda, $fechaIda
	// la misma logica con distintas variables

}

if($_SESSION["estadoVueloVuelta"] == null) {
	$_SESSION["estadoVueloVuelta"] = "pendiente de pago";	
} 

header("location: reservar.php");
?>