<?php
session_start();
include("conectarBaseDeDatos.php");

echo $tipoViaje = $_POST["tipoViaje"]; 
echo $provinciaOrigen = $_POST["provinciaOrigen"];
echo $ciudadOrigen = $_POST["ciudadOrigen"];
echo $provinciaDestino = $_POST["provinciaDestino"];
echo $ciudadDestino = $_POST["ciudadDestino"];
echo $categoria = $_POST["categoria"];

echo $fechaIda = $_POST["fechaIda"];
$date = date_create_from_format("d-m-Y",$fechaIda); 
echo $diaIda = date_format($date,"l");

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create_from_format("d-m-Y",$fechaVuelta);  
$diaVuelta = date_format($date,"l");

$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["categoria"] = $categoria;
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen; 
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadOrigen"] = $ciudadOrigen;
$_SESSION["fechaIda"] = $fechaIda;
$_SESSION["fechaVuelta"] = $fechaVuelta;


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

echo $vuelo_dia; // prueba

$query = "SELECT * 
FROM cieloytierra.programacionvuelos 
WHERE (cod_aeropuerto_origen = $ciudadOrigen
AND cod_aeropuerto_destino = $ciudadDestino)
AND $vuelo_dia = 1";

$result = mysqli_query($conexion,$query);

$rowProgramacionVuelos = mysqli_fetch_array($result);

if ( $rowProgramacionVuelos == null) {
	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha $fechaIda.";	
	// .header("location: vueloNoDisponible.php"); // prueba
	echo $_SESSION["resultadoBuscarVuelo"]; // prueba
} else {
	
	echo " no es null"; // prueba
	
	$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo'];
	
	$query = "SELECT * FROM cieloytierra.vuelos WHERE cod_programacion_vuelo = $idProgramacionVuelo
	AND fecha_vuelo = $fechaIda";

	$result = mysqli_query($conexion,$query);

	$rowVuelos = mysqli_fetch_array($result);

	if ($rowVuelos != null) {	
		
		echo "existe este recorrido con $fechaIda en la tabla"; // prueba

		$idVuelo = $rowVuelos['idVuelo'];
		$query = "SELECT * FROM cieloytierra.reservas  
		WHERE cod_vuelo = $idVuelo;";

		$result = mysqli_query($conexion,$query);

		$contador = 0;

		while($rowReservas = mysqli_fetch_array($result)) {
			$contador++;
		}

		$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo'];
		$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
		INNER JOIN cieloytierra.aviones
		ON programacionvuelos.cod_avion = aviones.idAvion
		WHERE idProgramacionVuelo = $idProgramacionVuelo";

		$row = mysqli_fetch_array($result);

		$limiteDeReservas = $row['$categoria'] + 10;

		if ($contador > $limiteDeReservas) { 
			$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha $fechaIda";
			header("location: vueloNoDisponible.php");
		}
		
		if ($contador > $row['$categoria'] && $contador < $limiteDeReservas) { 
			$_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaIda si realiza la reserva";					
		}
	}
}

?>

