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
    <title>CYT Aerol&iacuteneas - Reservar</title>

    <?php include("libreriasCSS.php"); ?>
    
    </head>
    <body>
    <div class="wrap">
        <div class="container">
            <?php include("navBar.php") ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
				    		<h3 class="panel-title">Pagar Reserva</h3>
				  		</div>	
				
						<div class="panel-body">   
                            
                            <!-- Form - Mi Reserva -->
                            <form role="form" method="post" action="pagarReserva.php">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nro de Tarjeta">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Codigo de Seguridad">
                                </div>

                                <div class="form-group">
                                    <label for="tarjeta">Tarjeta</label>
                                    <select class="form-control">   
                                        <option value="" disabled selected>Tarjeta</option>
                                        <option value="">Visa</option>
                                        <option value="">AmericanExpress</option>
                                        <option value="">MasterCard</option>
                                    </select>
                                </div>

                                <!-- Botón "Pagar" --> 
                                <button type="submit" class="btn btn-primary">Pagar</button>
                            </form>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel panel-primary -->
                </div><!-- /.col-md-6 col-md-offset-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.wrap -->
            
    <?php include("footer.php") ?>

    <?php include("libreriasJS.php"); ?>

    </body>
</html>
