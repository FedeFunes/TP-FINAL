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
                        <?php 
                        echo "<div class='alert alert-danger text-center' role='alert'>Reserva no encontrada.</div>";   
                        ?>
                    </div><!-- /.row -->
                </div><!-- /.col-md-8 col-md-offset-2 -->  

            </div><!-- /.container -->
        </div><!-- /.wrap -->
        <?php include("footer.php") ?>

        <?php include("libreriasJS.php"); ?>
   
    </body>
</html>
