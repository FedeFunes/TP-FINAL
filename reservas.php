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
                <div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
				    		<h3 class="panel-title">Buscar Reserva</h3>
				  		</div>	
				
						<div class="panel-body">   
                            
                            <!-- Form - Mi Reserva -->
                            <form role="form" method="post" action="buscarReserva.php">
                                
                                <!-- Ingrese Nro de Reserva -->
                                <div class="form-group">
                                    <input type="text" name="nroReserva" class="form-control" placeholder="Nro de Reserva">
                                    <span class="help-block help-block-reservas">Consulte y realice el Pago o Check-In de su Reserva</span>
                                </div>
                                
                                <!-- Botón "Buscar" --> 
                                <button type="submit" class="btn btn-primary">Buscar</button>
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
