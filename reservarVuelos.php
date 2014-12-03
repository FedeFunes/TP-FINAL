<?php
session_start();
include("conectarBaseDeDatos.php");


// guardo los datos del form
$nombre = $_POST["nombre"];
$_SESSION['nombre'] = $nombre;
$apellido = $_POST["apellido"];
$_SESSION['apellido'] = $apellido;
$email = $_POST["email"];
$dni = $_POST["dni"];
$fechaDeNacimiento = $_POST["fechaNacimiento"];

date_default_timezone_set("America/Argentina/Buenos_Aires"); // seteo la zona horaria
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
	
	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloIda, '$categoria', '$estadoVueloIda')";

	// mysqli_query($conexion, $sql); #Codigo original
	
	#TEST####################################################
	if (mysqli_query($conexion, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	#########################################################

} else {  // si no existe un vuelo para esta reserva, primero la creo y luego hago la reserva

	echo "idVueloIda != null </br>";
	$sql = "INSERT INTO vuelos (cod_programacion_vuelo, fecha_vuelo, tipo_viaje)
	VALUES ($idProgramacionVuelo, '$fechaIda', 1)"; // 1 es el id de "ida"

	// mysqli_query($conexion, $sql); #Codigo original

	#TEST########################################################
	if (mysqli_query($conexion, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	#############################################################	

	$idVueloIda = mysqli_insert_id($conexion); // esta función retorna el último id auto-incremental registrado
	$_SESSION['idVueloIda'] = $idVueloIda;

	$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
	VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloIda, '$categoria', '$estadoVueloIda')";

	// mysqli_query($conexion, $sql); #Codigo original

	#TEST########################################################
	if (mysqli_query($conexion, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	#############################################################	
}

$_SESSION["idReservaIda"] = mysqli_insert_id($conexion);

if($tipoViaje == "idaVuelta") {

	if($idVueloVuelta != null) { 

		$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
		VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloVuelta, '$categoria', '$estadoVueloVuelta')";

		// mysqli_query($conexion, $sql); #Codigo original

		#TEST########################################################
		if (mysqli_query($conexion, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
		#############################################################

	} else { // si no existe un vuelo para esta reserva, primero la creo y luego hago la reserva

		$sql = "INSERT INTO vuelos (cod_programacion_vuelo, fecha_vuelo, tipo_viaje)
		VALUES ($idProgramacionVuelo, '$fechaVuelta', 2)"; // 2 es el id de "vuelta"

		// mysqli_query($conexion, $sql); #Codigo original

		#TEST########################################################
		if (mysqli_query($conexion, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
		#############################################################	

		$idVueloVuelta = mysqli_insert_id($conexion); // esta función retorna el último id auto-incremental registrado
		$_SESSION['idVueloVuelta'] = $idVueloVuelta;

		$sql = "INSERT INTO reservas (nombre, apellido, dni, email, fecha_nacimiento, fecha_reserva, cod_vuelo, categoria, estado)
		VALUES ('$nombre', '$apellido', $dni, '$email', '$fechaDeNacimiento', '$fechaDeReserva', $idVueloVuelta, '$categoria', '$estadoVueloVuelta')";

		// mysqli_query($conexion, $sql); #Codigo original

		#TEST########################################################
		if (mysqli_query($conexion, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
		#############################################################
	}

$_SESSION["idReservaVuelta"] = mysqli_insert_id($conexion);

}


header("location: resultadoReservarVuelos.php"); #Codigo original
?>