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
 				    <div class="col-md-4 col-md-offset-4">
						<div class='alert alert-success text-center' role='alert'>El Check-In ha sido realizado con &eacutexito.</div>
 				    	<a href="boardingPassPDF.php" class="btn btn-primary btn-lg btn-block" role="button" target="_blank">Descargar Boarding Pass</a>                       
 				    </div><!-- /.row -->
 				</div><!-- /.col-md-8 col-md-offset-2 -->  

            </div><!-- /.container -->
        </div><!-- /.wrap -->
        <?php include("footer.php") ?>

        <?php include("libreriasJS.php"); ?>
   
    </body>
</html>

