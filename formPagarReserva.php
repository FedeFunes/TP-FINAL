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
                            <form role="form" method="post" action="pagarReserva.php" onSubmit="return validarFormPagarReserva();">
                                
                                <div class="form-group">
                                    <label for="nroDeTarjeta">Nro de Tarjeta</label>
                                    <input type="text" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" id="nroDeTarjeta">
                                    <span class="text-danger errorFormPagarReserva" id="errorNroDeTarjeta">No puedes dejar este campo en blanco o con un formato incorrecto.</span>   

                                </div>

                                <div class="form-group">
                                    <label for="codigoDeSeguridad">Codigo de Seguridad</label>
                                    <input type="text" class="form-control" placeholder="xxxx" id="codigoDeSeguridad">
                                    <span class="text-danger errorFormPagarReserva" id="errorCodigoDeSeguridad">No puedes dejar este campo en blanco o con un formato incorrecto.</span>   
                                </div>

                                <div class="form-group">
                                    <label for="tarjeta">Tarjeta</label>
                                    <select class="form-control" id="tarjeta">   
                                        <option value="" disabled selected>Tarjeta</option>
                                        <option value="visa">Visa</option>
                                        <option value="american express">American Express</option>
                                        <option value="mastercard">MasterCard</option>
                                    </select>
                                    <span class="text-danger errorFormPagarReserva" id="errorTarjeta">Seleccione una tarjeta.</span>   
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
