<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Mi Reserva</title>

	 <!-- CSS propio -->  
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="jquery/jquery-ui/jquery-ui.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQueryUI -->
    <script type="text/javascript" src="jquery/jquery-ui/jquery-ui.js"></script>
    <!-- Script para DatePicker -->
    <script type="text/javascript" src="jquery/script-datepicker.js"></script>
  
    </body>
</html>
