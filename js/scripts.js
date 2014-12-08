/* VALIDAR FORM - BUSCAR VUELOS */
function validarFormBuscarVuelos() {
  
    var provinciaOrigen = document.getElementById("provinciaOrigen"); 
    var provinciaDestino = document.getElementById("provinciaDestino");
    var categoria = document.getElementById("categoria");
    var fechaIda = document.getElementById("fechaIda");
    var fechaVuelta = document.getElementById("fechaVuelta");

    var radioIdaVuelta = document.getElementById("inlineRadio1");

    var errorProvinciaOrigen = document.getElementById("errorProvinciaOrigen");
    var errorProvinciaDestino = document.getElementById("errorProvinciaDestino");
    var errorCategoria = document.getElementById("errorCategoria");
    var errorFechaIda = document.getElementById("errorFechaIda");
    var errorFechaVuelta = document.getElementById("errorFechaVuelta");

    if(provinciaOrigen.value == "") {
        errorProvinciaOrigen.style.display = "inline";
        return false;
    } else {
        errorProvinciaOrigen.style.display = "none";
    }
    if(provinciaDestino.value == "") {
        errorProvinciaDestino.style.display = "inline";
        return false;
    } else {
        errorProvinciaDestino.style.display = "none";
    }

    if(categoria.value == "") {
        errorCategoria.style.display = "inline";
        return false;
    } else {
        errorCategoria.style.display = "none";
    }

    if(fechaIda.value == "") {
        errorFechaIda.style.display = "inline";
        return false;
    } else {
        errorFechaIda.style.display = "none";
    }
     
    if(radioIdaVuelta.checked == true) {    
        
        if(fechaVuelta.value == "") {
            errorFechaVuelta.style.display = "inline";
            return false;
        } else {
            errorFechaVuelta.style.display = "none";
        }
    }
}

/* VALIDAR FORM - RESERVAR */

function validar_form_reservar() {

    var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var email = document.getElementById("email").value;
	var dni = document.getElementById("dni").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

	var error_nombre = document.getElementById("error_nombre");
	var error_apellido = document.getElementById("error_apellido");
	var error_email = document.getElementById("error_email");
	var error_dni = document.getElementById("error_dni");
    var error_fecha_nacimiento = document.getElementById("error_fecha_nacimiento");


    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        error_nombre.style.display = "inline";
        return false;
    } else {
        error_nombre.style.display = "none";
    }

    if (apellido == null || apellido.length == 0 || /^\s+$/.test(apellido)) {
        error_apellido.style.display = "inline";
        return false;
    } else {
        error_apellido.style.display = "none";
    }

    if (!/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email)) {
        error_email.style.display = "inline";
        return false;
    } else {
        error_email.style.display = "none";
    }

    if (!/^\d{8}$/.test(dni)) {
        error_dni.style.display = "inline";
        return false;
    } else {
        error_dni.style.display = "none";
    }

    if (fecha_nacimiento == "") {
        error_fecha_nacimiento.style.display = "inline";
        return false;
    } else {
        error_fecha_nacimiento.style.display = "none";
    }
} 

/* OCULTAR/MOSTRAR CAMPO FECHA-VUELTA DEPENDIENDO DEL RADIO ELEGIDO (IDA Y VUELTA/SOLO IDA) */

function ocultar_campo_fecha_vuelta() {
	var campo_fecha_vuelta = document.getElementById("campo_fecha_vuelta");
	campo_fecha_vuelta.style.display = "none";
}

function mostrar_campo_fecha_vuelta() {
	var campo_fecha_vuelta = document.getElementById("campo_fecha_vuelta");
	campo_fecha_vuelta.style.display = "inherit";
}

/* MOSTRAR CIUDADES EN EL SELECT-CIUDAD-ORIGEN CON AJAX */

function mostrarCiudadesOrigen(idProvincia) {

    var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idProvincia == "") {
        document.getElementById("selectCiudadOrigen").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGÚN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("selectCiudadOrigen").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

  xmlhttp.open("GET","mostrarCiudades.php?idProvincia="+idProvincia,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
  xmlhttp.send();
}

/* MOSTRAR CIUDADES EN EL SELECT-CIUDAD-DESTINO CON AJAX */

function mostrarCiudadesDestino(idProvincia) {

    var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idProvincia == "") {
        document.getElementById("selectCiudadDestino").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("selectCiudadDestino").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

  xmlhttp.open("GET","mostrarCiudades.php?idProvincia="+idProvincia,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
  xmlhttp.send();
}

/* VALIDAR FORM - PARGAR RESERVA */
function validarFormPagarReserva() {
    var nroDeTarjeta = document.getElementById('nroDeTarjeta');
    var codigoDeSeguridad = document.getElementById('codigoDeSeguridad');
    var tarjeta = document.getElementById('tarjeta');

    var errorNroDeTarjeta = document.getElementById('errorNroDeTarjeta');
    var errorCodigoDeSeguridad = document.getElementById('errorCodigoDeSeguridad');
    var errorTarjeta = document.getElementById('errorTarjeta');

    // validar nro de tarjeta
    if (!/^\d{4}-\d{4}-\d{4}-\d{4}$/.test(nroDeTarjeta.value)) {
        errorNroDeTarjeta.style.display = "inline";
        return false;
    } else {
        errorNroDeTarjeta.style.display = "none";
    }

    // validar código de seguridad
    if (!/^\d{4}$/.test(codigoDeSeguridad.value)) {
        errorCodigoDeSeguridad.style.display = "inline";
        return false;
    } else {
        errorCodigoDeSeguridad.style.display = "none";
    }

    // validar tarjeta
    if (tarjeta.value == "") {
        errorTarjeta.style.display = "inline";
        return false;
    } else {
        errorTarjeta.style.display = "none";
    }
}

function mostrarValorEconomy(idCiudad) {
     var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idCiudad == "") {
        document.getElementById("valorEconomy").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("valorEconomy").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","mostrarValorEconomy.php?idCiudad="+idCiudad,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}

function mostrarValorPrimera(idCiudad) {
     var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idCiudad == "") {
        document.getElementById("valorPrimera").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("valorPrimera").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","mostrarValorPrimera.php?idCiudad="+idCiudad,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}

function mostrarValorAviones(idAvion) {
     var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idAvion == "") {
        document.getElementById("valorAvion").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("valorAvion").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","mostrarValorAviones.php?idAvion="+idAvion,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}

function mostrarGraficoCategoriaYDestino(idCiudad) {
     var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idCiudad == "") {
        document.getElementById("graficoCategoriaYDestino").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("graficoCategoriaYDestino").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","imgGraficoCategoriaYDestino.php?idCiudad="+idCiudad,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}

function mostrarGraficoAvionYDestino(idCiudad) {
     var xmlhttp;    

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idCiudad == "") {
        document.getElementById("graficoAvionYDestino").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("graficoAvionYDestino").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","imgGraficoAvionYDestino.php?idCiudad="+idCiudad,true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}

function mostrarValorAvionesPorDestino(idAvion,idCiudad) {
    var xmlhttp;    

    var idAvion = document.getElementById("selectAviones").value; // por las dudas

    // EN CASO DE QUE idProvincia NO TENGA VALOR

    if (idCiudad == "") {
        document.getElementById("valorAvionPorDestino").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGúN EL NAVEGADOR

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // VERIFICA onreadystatechange

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("valorAvionPorDestino").innerHTML = xmlhttp.responseText;  // LA RESPUESTA VA IR DENTRO DEL ELEMENTO INDICADO
        }
    }

    xmlhttp.open("GET","mostrarValorAvionesDestinos.php?idCiudad="+idCiudad+"&idAvion="+idAvion+"",true); //LLAMO AL PHP Y LE ENVÍO LA VARIABLE idProvincia
    xmlhttp.send();
}
