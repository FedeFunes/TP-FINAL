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
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php
                                echo "</br>ID Reserva IDA: ".$_SESSION["idReservaIda"];
                                echo "</br>ID Reserva VUELTA: ".$_SESSION["idReservaVuelta"];
                                // session_destroy();
                                ?>

                            </div><!-- /.panel-body -->
                        </div><!-- /.panel panel-default -->
                    </div><!-- /.col-md-6 -->  
                </div><!-- /.row -->
                    

            </div><!-- /.container -->
        </div><!-- /.wrap -->
        
        <?php include("footer.php") ?>
        
        <?php include("libreriasJS.php"); ?>
    </body>
</html>
