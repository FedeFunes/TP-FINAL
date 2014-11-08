<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Mi Reserva</title>

	<?php include("librerias-css.php"); ?>

    </head>
    <body>
    <div class="container">
		
        <?php include("nav-bar.php"); ?>
		
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <h3>Mi Reserva</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>C&oacutedigo</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Precio</th>
                            <th>Partida</th>
                            <th>Regreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Buenos Aires</td>
                            <td>Santa Fe</td>
                            <td>$1.500</td>
                            <td>11/11/2014</td>
                            <td>15/11/2014</td>
                        </tr>
                    </tbody>   
                </table>
                <button class="btn btn-link">>> Pagar Reserva</button></br>
                <button class="btn btn-link" disabled="disabled">>> Realizar Check-In</button>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                </br>
                <span><!--<span class="glyphicon glyphicon-info-sign"></span>-->Recuerde que tiene hasta 48hs previas al vuelo para realizar su pago sino la reserva sera cancelada.</span></br><span>Y que reci&eacuten dentro de las 48hs previas al vuelo puede hacer el Check-In.</span>
            </div>
        </div>        
        
        <?php include("footer.php") ?>

    </div>
  
    <?php include("librerias-js.php"); ?>
  
    </body>
</html>
