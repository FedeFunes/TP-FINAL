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
   <div id="wrap">
   <div class="container">

        <?php include("navBar.php") ?>

        <?php
        echo "</br>".$_SESSION["idReservaIda"];
        echo "</br>".$_SESSION["idReservaVuelta"];
        ?>

        <?php include("footer.php") ?>
    
        <?php include("libreriasJS.php"); ?>
   </div>
    </body>
</html>
