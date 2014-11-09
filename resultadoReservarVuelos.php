<?php
session_start();
include("conectarBaseDeDatos.php");

echo "</br>".$_SESSION["idReservaIda"];
echo "</br>".$_SESSION["idReservaVuelta"];
?>