<?php
session_start();
include("conectarBaseDeDatos.php");

switch ($_SESSION["categoria"]) {
    case 'economy':
        $precio_categoria = 'precio_economy';
        break;
    case 'primera':
        $precio_categoria = 'precio_primera';
        break;
}

$query = "SELECT P1.descripcion as provinciaOrigen, C1.descripcion as ciudadOrigen,
P2.descripcion as provinciaDestino, C2.descripcion as ciudadDestino,
V.fecha_vuelo as fechaVuelo, PV.$precio_categoria as precioCategoria,
R.categoria as categoria, R.estado as estado, R.cod_vuelo as codVuelo, R.categoria as categoria
FROM reservas R JOIN 
vuelos V ON R.cod_vuelo = V.idVuelo JOIN 
programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN 
aeropuertos A1 ON A1.idAeropuerto = PV.cod_aeropuerto_origen JOIN 
aeropuertos A2 ON A2.idAeropuerto = PV.cod_aeropuerto_destino JOIN 
ciudades C1 ON C1.idCiudad = A1.cod_ciudad JOIN 
ciudades C2 ON C2.idCiudad = A2.cod_ciudad JOIN 
provincias P1 ON C1.cod_provincia = P1.idProvincia JOIN
provincias P2 ON C2.cod_provincia = P2.idProvincia
WHERE R.idReserva = ".$_SESSION["nroReserva"].";"; 

$result = mysqli_query($conexion,$query);
$reserva = mysqli_fetch_array($result); 

$_SESSION["provinciaOrigen"] = $reserva["provinciaOrigen"];
$_SESSION["codVuelo"] = $reserva["codVuelo"];
$_SESSION["ciudadOrigen"] = $reserva["ciudadOrigen"];
$_SESSION["provinciaDestino"] = $reserva["provinciaDestino"]; 
$_SESSION["ciudadDestino"] = $reserva["ciudadDestino"];
$_SESSION["categoria"] = $reserva["categoria"];
$_SESSION["precioCategoria"] = $reserva["precioCategoria"];
$_SESSION["reserva"] = $reserva["fechaVuelo"]; 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Mi Reserva</title>

	<?php include("libreriasCSS.php"); ?>

    </head>
    <body>
    <div class="wrap">
        <div class="container">
    		
            <?php include("navBar.php"); ?>
    		
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <h3>Mi Reserva</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nro Reserva</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Precio - <?php echo $_SESSION["categoria"]; ?></th>
                                <th>Fecha Vuelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $_SESSION["nroReserva"]; ?></th>
                                <td><?php echo $reserva["provinciaOrigen"]." - ".$reserva["ciudadOrigen"] ?></td>
                                <td><?php echo $reserva["provinciaDestino"]." - ".$reserva["ciudadDestino"] ?></td>
                                <td><?php echo "$".$reserva["precioCategoria"]?></td>
                                <td><?php echo $reserva["fechaVuelo"]?></td>
                            </tr>
                        </tbody>   
                    </table>
                    <?php
                   
                    if ($reserva["estado"] == 'pendiente de pago') {
                        echo "<a href='formPagarReserva.php'><button class='btn btn-link'> >> Pagar Reserva</button></a></br>";
                        echo "<button class='btn btn-link' disabled='disabled'> >> Realizar Check-In</button>";
                    }

                    if ($reserva["estado"] == 'pediente de check-in') {
                        echo "<button class='btn btn-link' disabled='disabled'><a href='formPagarReserva.php'> >> Pagar Reserva</a></button></br>";
                        echo "<a href='#''><button class='btn btn-link'><a href=''> >> Realizar Check-In<</button></a>";
                    }
                    ?>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-warning" role="alert">
                        Recuerde que tiene hasta 48hs previas al vuelo para realizar su pago sino la reserva sera cancelada.
                        </br>Y que reci&eacuten dentro de las 48hs previas al vuelo puede hacer el Check-In.        
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-md-10 col-md-offset-1 -->         
        </div><!-- /.container -->
    </div><!-- /.wrap -->

    <?php include("footer.php") ?>
  
    <?php include("libreriasJS.php"); ?>
  
    </body>
</html>
