<?php
session_start();
include("conectarBaseDeDatos.php");

switch ($_SESSION["categoria"]) {
    case 'economy':
        $precio_categoria = 'precio_economy';
        break;
    case 'primera':
        $precio_categoria = 'precio_primera';
        break;
}

$query = "SELECT A1.descripcion as aeropuertoOrigen, C1.descripcion as ciudadOrigen, A2.descripcion as aeropuertoDestino, 
C2.descripcion as ciudadDestino, PV.$precio_categoria as precioCategoria
FROM programacionvuelos PV JOIN 
aeropuertos A1 ON A1.idAeropuerto = PV.cod_aeropuerto_origen JOIN 
aeropuertos A2 ON A2.idAeropuerto = PV.cod_aeropuerto_destino JOIN 
ciudades C1 ON C1.idCiudad = A1.cod_ciudad JOIN 
ciudades C2 ON C2.idCiudad = A2.cod_ciudad JOIN 
provincias P1 ON C1.cod_provincia = P1.idProvincia JOIN
provincias P2 ON C2.cod_provincia = P2.idProvincia
WHERE PV.idProgramacionVuelo = ".$_SESSION["idProgramacionVuelo"].""; 

$result = mysqli_query($conexion,$query);
$vueloElegido = mysqli_fetch_array($result); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Reservar</title>

    <?php include("libreriasCSS.php") ?>
    
    </head>
    <body>
        <div class="wrap">
            <div class="container">
        		
                <?php include("navBar.php");?>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        
                        <h3>Vuelo elegido</h3>
                        <!-- Tabla -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Partida</th>
                                    <th>Regreso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $vueloElegido["ciudadOrigen"] ?></td>
                                    <td><?php echo $vueloElegido["ciudadDestino"] ?></td>
                                    <td><?php echo $_SESSION["categoria"] ?></td>
                                    <td><?php echo "$".$vueloElegido["precioCategoria"] ?></td>
                                    <td><?php echo $_SESSION["fechaIda"] ?></td>
                                    <td><?php if($_SESSION["fechaVuelta"] == '') {echo "-";} else {echo $_SESSION["fechaVuelta"];} ?></td>
                                </tr>
                            </tbody>   
                        </table>
                    </div>
                </div>
                
                <!-- Aviso en caso de que quede en lista de espera -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php 
                        if ($_SESSION["estadoVueloIda"] == 'lista de espera') {
                            echo "<div class='alert alert-danger' role='alert'> AVISO: Va a quedar en lista de espera en el vuelo de fecha partida: ".$_SESSION["estadoVueloIda"]." si realiza la reserva.</div>";   
                        }

                        if ($_SESSION["estadoVueloVuelta"] == 'lista de espera') {
                            echo "<div class='alert alert-danger' role='alert'>AVISO: Va a quedar en lista de espera en el vuelo de fecha regreso: ".$_SESSION["estadoVueloVuelta"]." si realiza la reserva.</div>";   
                        }
                        ?>                   
                    </div><!-- /.row -->
                </div><!-- /.col-md-8 col-md-offset-2 -->     

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        
                        <!-- Formulario -->
                        <form action="reservarVuelos.php" method="post" onsubmit="return validar_form_reservar()" role="form" >
                            
                            <h4>Complete el formulario para reservarlo</h4>
                            
                            <!-- Campo Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
                                <span class="text-danger error_form_reservar" id="error_nombreyapellido">No puedes dejar este campo en blanco.</span>
                            </div>

                            <!-- Campo Apellido -->
                            <div class="form-group">
                                <label for="nombre">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                                <span class="text-danger error_form_reservar" id="error_apellido">No puedes dejar este campo en blanco.</span>
                            </div>

                            <!-- Campo Email -->                    
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <span class="text-danger error_form_reservar" id="error_email">No puedes dejar este campo en blanco o con un formato de Email incorrecto.</span>   
                            </div>
                            
                            <!-- Campo DNI -->                    
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI">
                                <span class="text-danger error_form_reservar" id="error_dni">No puedes dejar este campo en blanco o con un formato de DNI incorrecto.</span> 
                            </div>

                            <!-- Campo Fecha Nacimiento -->                    
                            <div class="form-group">
                                <label for="fecha_nac">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" name="fechaNacimiento" id="fechaNac" placeholder="Fecha de Nacimiento">
                                <span class="text-danger error_form_reservar">No puedes dejar este campo en blanco.</span>
                            </div>
                            
                            <!-- Submit Reservar-->
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Reservar">
                            </div>
                        </form>
                    </div>
                </div>        
            
            </div><!-- /.container -->
        </div><!-- /.wrap -->
        
        <?php include("footer.php");?>
        <?php include("libreriasJS.php");?>  

    </body>
</html>
