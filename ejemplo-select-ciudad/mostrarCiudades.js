
function mostrarCiudades(provincia) {
  
    var xmlhttp;    

    // SI NO HAY VALOR

    if (provincia == "") {
        document.getElementById("selectCiudades").innerHTML="";
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
            document.getElementById("selectCiudades").innerHTML = xmlhttp.responseText;  // LE DIGO que la respuesta va ir dentro del id del elemento que le indique
        }
    }

  xmlhttp.open("GET","mostrarCiudades.php?provincia="+provincia,true);
  //xmlhttp.open("GET","mostrarCiudades.php",true);
  xmlhttp.send();
}
