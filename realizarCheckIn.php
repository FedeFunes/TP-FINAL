<?php
session_start();
include("conectarBaseDeDatos.php");

# Primero: tengo que consultar en qué AVIÓN va a volar el pasajero pasa saber cuás es
# la cantidad de FILAS y COLUMNAS que tiene dependiendo de la CATEGORÍA que haya elegido

// $_SESSION['idReserva'] = 2; # PARA TESTING
// $_SESSION['categoria'] = 1; # PARA TESTING, 2 es "economy"
// $_SESSION['cod_vuelo'] = 1; # PARA TESTING

switch ($_SESSION['categoria']) {
    case '1':
        $filas_categoria = "filas_primera";
        $columnas_categoria = "columnas_primera";
        break; 
    
    case '2':
        $filas_categoria = "filas_economy";
        $columnas_categoria = "columnas_economy";
        break;
}

$query = "SELECT $filas_categoria, $columnas_categoria FROM reservas R
INNER JOIN vuelos V ON R.cod_vuelo = V.idVuelo
INNER JOIN programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo
INNER JOIN aviones A ON PV.cod_avion = A.idAvion
WHERE R.idReserva = ".$_SESSION['idReserva'].";";

$result = mysqli_query($conexion,$query);
$row = mysqli_fetch_array($result);

$filasCategoria = $row[''.$filas_categoria.''];
$columnasCategoria = $row[''.$columnas_categoria.''];

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
                    <form action="procesarCheckIn.php" method="post" role="form">                    
                        <table class="table table-bordered">
                        
                        <?php
                        
                        echo "<tr>";
                        echo "<td></td>";

                        for ($i=1; $i < $columnasCategoria+1 ; $i++){ 
                             echo "<td class='text-center'><strong>$i</strong></td>";
                        }

                        echo "<tr>";

                        for ($i=1; $i < $filasCategoria+1 ; $i++){ 
                             
                            echo "<tr>";
                            echo "<td class='text-center'><strong>$i</strong></td>";
                           
                            for ($j=1; $j < $columnasCategoria+1; $j++) { 
                                
                                #HACER LA VALIDACION(if) Y LA CONSULTA ANTES DE CREAR LA TABLA
                                #aca tendria que hacer una consulta preguntando en la base si existe este asiento en ese vuelo y en la misma categoria
                                #en casa de que exista no mostrar el input 

                                $query = "SELECT * FROM asientos A
                                INNER JOIN reservas R ON A.cod_reserva = R.idReserva
                                WHERE R.cod_vuelo = ".$_SESSION['codVuelo']." 
                                AND R.categoria = ".$_SESSION['categoria']."
                                AND A.fila = $i 
                                AND A.columna = $j;";

                                $result = mysqli_query($conexion,$query);
                                $cantDeFilasDevueltas = mysqli_num_rows($result);       

                                
                                if($cantDeFilasDevueltas == 1) {    
                                    echo "<td class='danger'>"; 
                                    echo "<div class='text-center'>".$i." - ".$j."</div>";
                                    echo "<div class='text-center'><input type='radio' disabled></div>";                                    
                                    echo "</td>";
                                } else {
                                    echo "<td class='success'>"; 
                                    echo "<div class='text-center'>".$i." - ".$j."</div>";
                                    echo "<div class='text-center'><input type='radio' value='".$i."-".$j."' name='asiento'></div>";
                                    echo "</td>";
                                }
                            }
                            
                            echo "</tr>";
                        }
                        ?>
                        </table>
                        <button type="submit" class="btn btn-primary btn-lg center-block">Confirmar Pasaje</button> 
                    </form>
                    </div><!-- /.row -->
                </div><!-- /.col-md-10 col-md-offset-1 --> 

            </div><!-- /.container -->
        </div><!-- /.wrap -->
        <?php include("footer.php") ?>

        <?php include("libreriasJS.php"); ?>
   
    </body>
</html>
