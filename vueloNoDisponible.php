<?php
include("conectarBaseDeDatos.php");
session_start();
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
 				    <div class="col-md-8 col-md-offset-2">
 				        <?php 
						echo "<div class='alert alert-danger' role='alert'>".$_SESSION["resultadoBuscarVuelo"]."</div>";   
 				        ?>
 				    	<a href='grillaVuelos.php'> >> Consulte la grilla de vuelos</a>                       
 				    </div><!-- /.row -->
 				</div><!-- /.col-md-8 col-md-offset-2 -->  

            </div><!-- /.container -->
        </div><!-- /.wrap -->
        <?php include("footer.php") ?>

        <?php include("libreriasJS.php"); ?>
   
    </body>
</html>

<?php session_destroy(); ?>