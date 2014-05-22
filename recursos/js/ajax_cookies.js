var objetoXHR = false;
var  objeto_destino='';
if (window.XMLHttpRequest)
{
        objetoXHR = new XMLHttpRequest();
}
else if (window.ActiveXObject) 
{
        objetoXHR = new ActiveXObject("Microsoft.XMLHTTP") ;
}

function obtenerDatosServidor(ruta,elemento_id){
        if (objetoXHR){
                //objeto_destino = document.getElementById(elemento_id) ;
                //objeto_destino.innerHTML = "<img src='ajax-loader.gif'/>"//"Cargando...";
                objetoXHR.open("GET",ruta) ;
                objetoXHR.onreadystatechange = respuesta; 
                objetoXHR.send(null) ; 
        }
}        

function respuesta () {          
        if (objetoXHR.readyState==4 && objetoXHR.status==200){
                //objeto_destino.innerHTML = objetoXHR.responseText;
                objeto_destino = objetoXHR.responseText;
                alert('objeto_destino: ' + objeto_destino);
        }
}


