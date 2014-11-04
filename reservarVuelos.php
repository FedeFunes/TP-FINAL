<?php
session_start();
include("conectarBaseDeDatos.php");


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$dni = $_POST["dni"];
$fechaDeNacimiento = $_POST["fechaNacimiento"];
$fechaDeReserva = date("y-m-d");

$categoria = $_SESSION["categoria"];
$estadoVueloIda = $_SESSION["estadoVueloIda"];
$estadoVueloVuelta = $_SESSION["estadoVueloVuelta"];
$idVueloIda = $_SESSION["idVueloIda"];
$idVueloVuelta = $_SESSION["idVueloVuelta"];
$idProgramacionVuelo = $_SESSION["idProgramacionVuelo"];
$fechaIda = $_SESSION["fechaIda"];
$tipoViaje = $_SESSION["tipoViaje"];
$fechaVuelta = $_SESSION["fechaVuelta"];


if($idVueloIda != null) { 

	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', $fechaDeNacimiento, $fechaDeReserva, $idVueloIda, '$categoria', '$estadoVueloIda')";

	mysqli_query($conexion, $sql);	

} else { 

	$sql = "INSERT INTO vuelos (cod_programacion_vuelo, fecha_vuelo, tipo_viaje)
	VALUES ($idProgramacionVuelo, $fechaIda, '$tipoViaje')";

	mysqli_query($conexion, $sql);	

	$query = "SELECT idVuelo FROM vuelos
	WHERE (cod_programacion_vuelo = $idProgramacionVuelo
	AND fecha_vuelo = $fechaida)
	AND tipo_viaje = $tipoViaje";
	
	$result = mysqli_query($conexion,$query);
	$rowIdvuelo = mysqli_fetch_array($result);

	$idVueloIda = $rowIdvuelo[0];

	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', $fechaDeNacimiento, $fechaDeReserva, $idVueloIda, '$categoria', '$estadoVueloIda')";
}

$_SESSION["idReservaIda"] = mysqli_insert_id($conexion);

if($tipoViaje == "idaVuelta") {

	if($idVueloVuelta != null) { 

	
	} else { 

	}
}

$_SESSION["idReservaVuelta"] = mysqli_insert_id($conexion);

header("location: resultadoReservar.php");
?>