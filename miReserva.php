<?php
session_start();
include("conectarBaseDeDatos.php");
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
                                <th>Origen</th>
                                <th>Destino</th>                                
                                <th>Id Vuelo</th>
                                <th>Categor&iacutea</th>
                                <th>Precio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $_SESSION["idReserva"]; ?></th>
                                <th><?php echo $_SESSION["dniPasajero"]; ?></th>
                                <th><?php echo $_SESSION["provinciaOrigen"]." - </br>".$_SESSION["ciudadOrigen"];?></th>
                                <th><?php echo $_SESSION["provinciaDestino"]." - </br>".$_SESSION["ciudadDestino"];?></th>
                                <th><?php echo $_SESSION["codVuelo"]; ?></th>
                                <th><?php echo $_SESSION["categoriaNombre"]; ?></th>
                                <th><?php echo $_SESSION["precioCategoria"]; ?></th>
                                <th><?php echo $_SESSION["estadoNombre"]; ?></th>
                            </tr>
                        </tbody>   
                    </table>
                    
                    <?php

                    $fechaHorarioVuelo = $_SESSION['fechaVuelo']." ".$_SESSION['horarioPartida']; // cocateno la fecha y el horario 
                    date_default_timezone_set("America/Argentina/Buenos_Aires"); // seteo la zona horaria
                    $fechaHorarioActual = date("Y-m-d H:i:s"); // obtengo la hora actual en un string 

                    $fechaHorarioVuelo2hsAntes = strtotime("-2 hours", strtotime($fechaHorarioVuelo)); // le resto 2hs 
                    $fechaHorarioVuelo24hsAntes = strtotime("-24 hours", strtotime($fechaHorarioVuelo)); // le resto 48hs
                    $fechaHorarioVuelo48hsAntes = strtotime("-48 hours", strtotime($fechaHorarioVuelo)); // le resto 48hs
                    $fechaHorarioAhora = strtotime($fechaHorarioActual);
                    
                    #TESTING################################################                        
                    /* 
                    echo "</br>";                        
                    echo "<strong>Fecha y horario actual:</strong> ".date("Y-m-d / H:i:s",$fechaHorarioAhora);
                    echo "</br>";
                    echo "<strong>Fecha y horario del despuegue:</strong> ".$_SESSION['fechaVuelo']." / ".$_SESSION['horarioPartida'];
                    echo "</br>";
                    echo "<strong>Fecha y horario 2hs antes del despegue:</strong> ".date("Y-m-d / H:i:s",$fechaHorarioVuelo2hsAntes);                        
                    echo "</br>";
                    echo "<strong>Fecha y horario 24hs antes del despegue:</strong> ".date("Y-m-d / H:i:s",$fechaHorarioVuelo24hsAntes);
                    echo "</br>";
                    echo "<strong>Fecha y horario 48hs antes del despegue:</strong> ".date("Y-m-d / H:i:s",$fechaHorarioVuelo48hsAntes);
                    echo "</br>";
                   
                    echo "</br>";
                    echo "En formatos timestamp:";
                    echo "</br>";
                    echo "fechaHorarioVuelo2hsAntes: ".$fechaHorarioVuelo2hsAntes;                        
                    echo "</br>";
                    echo "fechaHorarioVuelo24hsAntes: ".$fechaHorarioVuelo24hsAntes;
                    echo "</br>";
                    echo "fechaHorarioVuelo48hsAntes: ".$fechaHorarioVuelo48hsAntes;
                    echo "</br>";
                    echo "fechaHorarioActual: ".$fechaHorarioAhora;
                    echo "</br>";
                    echo "</br>";
                    */
                    ########################################################
                   
                    // en todos los botones de pagar dejo un espacio 
                    if ($_SESSION["estado"] == 1) {  // 1 es el id de "Pendiente de Pago"

                        if($fechaHorarioAhora < $fechaHorarioVuelo24hsAntes) {
                            echo "<a href='formPagarReserva.php' class='btn btn-primary btn-lg' role='button'>Pagar Reserva</a> ";
                        } else {
                            echo "<a class='btn btn-primary btn-lg' disabled='disabled'>Pagar Reserva</a> ";  
                        }
                        
                    } elseif ($_SESSION["estado"] == 6) { // 6 es el id de "Habilitado"
                    
                        echo "<a href='formPagarReserva.php' class='btn btn-primary btn-lg' role='button'>Pagar Reserva</a> ";
                    
                    } else {

                        echo "<a class='btn btn-primary btn-lg' disabled='disabled'>Pagar Reserva</a> ";
                    }


                    if ($_SESSION["estado"] == 2) {  // 2 es el id de "Pendiente de Check-In"

                        if($fechaHorarioVuelo48hsAntes < $fechaHorarioAhora and $fechaHorarioAhora < $fechaHorarioVuelo2hsAntes) {
                            echo "<a href='realizarCheckIn.php' class='btn btn-primary btn-lg' role='button'>Realizar Check-In</a>";
                        } else {
                            echo "<a class='btn btn-primary btn-lg' disabled='disabled'>Realizar Check-In</a>";
                        }
                        
                    } elseif ($_SESSION["estado"] == 6) { // 6 es el id de "Habilitado"
                    
                        echo "<a href='realizarCheckIn.php' class='btn btn-primary btn-lg' role='button'>Realizar Check-In</a>";
                    
                    } else {

                        echo "<a class='btn btn-primary btn-lg' disabled='disabled'>Realizar Check-In</a>";
                    }


                    ?>    
                </div><!-- /.row -->
            </div><!-- /.col-md-10 col-md-offset-1 --> 
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    </br>
                    <div class="alert alert-warning" role="alert">
                        Recuerde que hasta las 24hs previas al vuelo puede realizar el pago sino la reserva sera anulada
                        y desde las 48hs previas hasta las 2hs previas al vuelo puede realizar el Check-In.        
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-md-10 col-md-offset-1 -->         
        </div><!-- /.container -->
    </div><!-- /.wrap -->

    <?php include("footer.php") ?>
  
    <?php include("libreriasJS.php"); ?>
  
    </body>
</html>
