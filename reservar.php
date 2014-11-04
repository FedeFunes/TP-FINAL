<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYT Aerol&iacuteneas - Reservar</title>

    <?php include("librerias-css.php") ?>
    
    </head>
    <body>
    <div class="container">
		
        <?php include("nav-bar.php");?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <h3>Vuelo elegido</h3>
                <!-- Tabla -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Precio</th>
                            <th>Partida</th>
                            <th>Regreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Buenos Aires</td>
                            <td>Santa Fe</td>
                            <td>$1.500</td>
                            <td>11/11/2014</td>
                            <td>15/11/2014</td>
                        </tr>
                    </tbody>   
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <!-- Formulario -->
                <form action="#" method="post" onsubmit="return validar_form_reservar()" role="form" >
                    
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
                        <input type="text" class="form-control" name="fechaNacimiento" id="fecha_nac" placeholder="Fecha de Nacimiento">
                        <span class="text-danger error_form_reservar">No puedes dejar este campo en blanco.</span>
                    </div>
                    
                    <!-- Submit Reservar-->
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Reservar">
                    </div>
                </form>
            </div>
        </div>        
    
        <?php include("footer.php");?>

    </div>

        <?php include("librerias-js.php") ?>  

    </body>
</html>
