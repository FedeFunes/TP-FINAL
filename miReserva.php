<?php
session_start();
include("conectarBaseDeDatos.php");

/*#CÓDIGO BUGUEADO. NO INDISPENSABLE#############################################

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
$_SESSION["fechaVuelo"] = $reserva["fechaVuelo"];

###############################################################################*/ 
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
                                <th>DNI Pasajero</th>
                                <th>Id Vuelo</th>
                                <th>Categor&iacutea</th>
                                <th>Estado</th>
                                
                                <!-- CODIGO BUGUEADO. NO INDISPENSABLE.
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Precio (<?php echo $_SESSION["categoria"]; ?>)</th>
                                <th>Fecha Vuelo</th> 
                                -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $_SESSION["idReserva"]; ?></th>
                                <th><?php echo $_SESSION["dniPasajero"]; ?></th>
                                <th><?php echo $_SESSION["codVuelo"]; ?></th>
                                <th><?php echo $_SESSION["categoria"]; ?></th>
                                <th><?php echo $_SESSION["estado"]; ?></th>
                                
                                <!-- CODIGO BUGUEADO. NO INDISPENSABLE.
                                <td><?php echo $_SESSION["provinciaOrigen"]." - ".$_SESSION["ciudadOrigen"] ?></td>
                                <td><?php echo $_SESSION["provinciaDestino"]." - ".$_SESSION["ciudadDestino"] ?></td>
                                <td><?php echo "$".$_SESSION["precioCategoria"]?></td>
                                <td><?php echo $_SESSION["fechaVuelo"]?></td> 
                                -->
                            </tr>
                        </tbody>   
                    </table>
                    <?php
                   
                    if ($_SESSION["estado"] == 1) { // 1 es el id de "Pendiente de Pago"
                       
                        #HASTA FECHA-HORARIO PUEDE REALIZAR EL PAGO?

                        echo "<a href='formPagarReserva.php'><button class='btn btn-link'> >> Pagar Reserva</button></a></br>";
                        echo "<button class='btn btn-link' disabled='disabled'> >> Realizar Check-In</button>";
                    }

                    if ($_SESSION["estado"] == 2) { // 2 es el id de "Pendiente de Check-In"
                        
                        //Consulto la FECHA y el HORARIO del VUELO
                        $query = "SELECT fecha_vuelo, hora_partida FROM reservas R 
                        INNER JOIN vuelos V ON R.cod_vuelo = V.idVuelo 
                        INNER JOIN programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo
                        WHERE idReserva =".$_SESSION["idReserva"].";";

                        $result = mysqli_query($conexion,$query);
                        $row = mysqli_fetch_array($result);
                        

                        $fechaHorarioVuelo = "".$row['fecha_vuelo']." ".$row['hora_partida'].""; // cocateno la fecha y el horario 
                        date_default_timezone_set("America/Argentina/Buenos_Aires"); // seteo la zona horaria
                        $fechaHorarioActual = date("Y-m-d H:i:s"); // obtengo la hora actual en un string 

                        $fechaHorarioVuelo2hsAntes = strtotime("-2 hours", $fechaHorarioVuelo); // le resto 2hs 
                        $fechaHorarioVuelo48hsAntes = strtotime("-48 hours", $fechaHorarioVuelo); // le resto 48hs

                        if($fechaHorarioVuelo2hsAntes > strtotime($fechaHorarioActual) and strtotime($fechaHorarioActual) < $fechaHorarioVuelo48hsAntes) {
                            echo "<button class='btn btn-link' disabled='disabled'> >> Pagar Reserva (ya est&aacute paga)</button>";
                            echo "</br>";
                            echo "<a href='#''><button class='btn btn-link'> >> Realizar Check-In</button></a>";
                        } 
                    }

                    ?>    
                </div><!-- /.row -->
            </div><!-- /.col-md-10 col-md-offset-1 --> 
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
