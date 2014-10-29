/* VALIDAR FORM-RESERVAR */

function validar_form_reservar() {
	var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var email = document.getElementById("email").value;
	var dni = document.getElementById("dni").value;

	var error_nombre = document.getElementById("error_nombre");
	var error_apellido = document.getElementById("error_apellido");
	var error_email = document.getElementById("error_email");
	var error_dni = document.getElementById("error_dni");

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

	return true;
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

/* MOSTRAR CIUDADES EN EL SELECT-CIUDAD CON AJAX */

function mostrarCiudades(provincia) {
  
    var xmlhttp;    

    // SI NO HAY VALOR

    if (provincia == "") {
        document.getElementById("selectCiudad").innerHTML="";
        return;
    }

   // CREA EL OBJETO XMLHttpRequest SEGUN EL NAVEGADOR

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
            document.getElementById("selectCiudad").innerHTML = xmlhttp.responseText;  // LE DIGO que la respuesta va ir dentro del id del elemento que le indique
        }
    }

  xmlhttp.open("GET","mostrarCiudades.php?provincia="+provincia,true); //LLAMO AL PHP 
  xmlhttp.send();
}


