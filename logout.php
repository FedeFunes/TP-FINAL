<?php
	include("conectarBaseDeDatos.php"); 
	if (!isset($_SESSION))
	{
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Log Out</title>

    <?php include("libreriasCSS.php"); ?>
    
    </head>
    <body>
    <div class="wrap">
        <div class="container">
            <?php include("logoutNavBar.php") ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
				    		<h3 class="panel-title">Fin de Sesi&oacute;n</h3>
				  		</div>	
				
						<div class="panel-body">   
                            <p class="text-info">
								Usted ha salido del sistema. Para volver a ingresar, presione <a href="login.php">aqu&iacute;</a>.
							</p>
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
