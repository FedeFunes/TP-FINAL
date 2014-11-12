<?php
session_start();
include("conectarBaseDeDatos.php");


// guardo los datos del form
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$dni = $_POST["dni"];
$fechaDeNacimiento = $_POST["fechaNacimiento"];
$fechaDeReserva = date("y-m-d"); // obtengo la fecha del servidor

//guardo los datos de la session
$categoria = $_SESSION["categoria"];
$estadoVueloIda = $_SESSION["estadoVueloIda"];
$estadoVueloVuelta = $_SESSION["estadoVueloVuelta"];
$idVueloIda = $_SESSION["idVueloIda"];
$idVueloVuelta = $_SESSION["idVueloVuelta"];
$idProgramacionVuelo = $_SESSION["idProgramacionVuelo"];
$fechaIda = $_SESSION["fechaIda"];
$tipoViaje = $_SESSION["tipoViaje"];
$fechaVuelta = $_SESSION["fechaVuelta"];


if($idVueloIda != null) { // si ya existe un vuelo para esta reserva, directamente la hago

	echo "$idVueloIda != null";
	
	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloIda, '$categoria', '$estadoVueloIda')";

	mysqli_query($conexion, $sql);	

} else {  // si no existe un vuelo para esta reserva, primero la creo y luego hago la reserva

	echo "else $idVueloIda != null";
	

	$sql = "INSERT INTO vuelos (cod_programacion_vuelo, fecha_vuelo, tipo_viaje)
	VALUES ($idProgramacionVuelo, '$fechaIda', 'ida')";

	mysqli_query($conexion, $sql);	

	$idVueloIda = mysqli_insert_id($conexion); // esta función retorna el último id auto-incremental registrado

	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloIda, '$categoria', '$estadoVueloIda')";

	mysqli_query($conexion, $sql);
}

$_SESSION["idReservaIda"] = mysqli_insert_id($conexion);

if($tipoViaje == "idaVuelta") {

	if($idVueloVuelta != null) { 

		// misma logica, diferentes variables

	} else { 

		// misma logica, diferentes variables

	}
}

$_SESSION["idReservaVuelta"] = mysqli_insert_id($conexion);

header("location: resultadoReservarVuelos.php");
?>