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

$query = "SELECT PV.hora_partida as horarioPartida, P1.descripcion as provinciaOrigen, C1.descripcion as ciudadOrigen,
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
$_SESSION["fechaVuelo"] = $reserva["fechaVuelo"]; 
$_SESSION["horarioPartida"] = $reserva["horarioPartida"];
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
                                <th>Precio (<?php echo $_SESSION["categoria"]; ?>)</th>
                                <th>Fecha - Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $_SESSION["nroReserva"]; ?></th>
                                <td><?php echo $_SESSION["provinciaOrigen"]." - ".$_SESSION["ciudadOrigen"] ?></td>
                                <td><?php echo $_SESSION["provinciaDestino"]." - ".$_SESSION["ciudadDestino"] ?></td>
                                <td><?php echo "$".$_SESSION["precioCategoria"]?></td>
                                <td><?php echo $_SESSION["fechaVuelo"]." - ".$_SESSION["horarioPartida"] ?></td>
                            </tr>
                        </tbody>   
                    </table>
                    <?php
                   
                    if ($reserva["estado"] == 'pendiente de pago') {
                        echo "<a href='formPagarReserva.php'><button class='btn btn-link'> >> Pagar Reserva</button></a></br>";
                        echo "<button class='btn btn-link' disabled='disabled'> >> Realizar Check-In</button>";
                    }

                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $fechaDespegue =  $_SESSION["fechaVuelo"];
                    $horarioDespegue = $_SESSION["horarioPartida"];
                    $fechaYHorarioDespegue = "".$fechaDespegue." ".$horarioDespegue."";
                    $fechaYHorarioDespegue48hsAntes = strtotime('-2 day',strtotime($fechaYHorarioDespegue));
                    $fechaYHorarioDespegue2hsAntes = strtotime('-2 hours',strtotime($fechaYHorarioDespegue));
                    $fechaHorarioActual = strtotime(date("Y-m-d h:i:s"));

                    // Test
                    echo "</br>Fecha y Horario actual: ".date("Y-m-d H:i:s",$fechaHorarioActual);
                    echo "</br>Fecha y Horario 48hs antes del despegue: ".date("Y-m-d H:i:s",$fechaYHorarioDespegue48hsAntes);
                    echo "</br>Fecha y Horario 48hs antes del despegue: ".date("Y-m-d H:i:s",$fechaYHorarioDespegue2hsAntes);

                    if ($reserva["estado"] == 'pendiente de check-in') {

                        if ($fechaHorarioDespegue48hsAntes > $fechaHorarioActual && $fechaHorarioActual < $fechaHorarioDespegue2hsAntes) {
                            echo "<button class='btn btn-link' disabled='disabled'> >> Pagar Reserva (ya est&aacute paga)</button></br>";
                            echo "<a href='#''><button class='btn btn-link'><a href=''> >> Realizar Check-In</button></a>";
                        } else {
                            echo "<button class='btn btn-link' disabled='disabled'> >> Pagar Reserva (ya est&aacute paga)</button></br>";
                            echo "<button class='btn btn-link' disabled='disabled'> >> Realizar Check-In</button>";
                        }
                    }
                    ?>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-warning" role="alert">
                        Recuerde que hasta 48hs previas al vuelo puede realizar el pago sino la reserva sera cancelada.
                        Y reci&eacuten dentro de las 48hs previas al vuelo puede realizar el Check-In.        
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-md-10 col-md-offset-1 -->         
        </div><!-- /.container -->
    </div><!-- /.wrap -->

    <?php include("footer.php") ?>
  
    <?php include("libreriasJS.php"); ?>
  
    </body>
</html>
