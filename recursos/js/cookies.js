// name - nombre de la cookie
// value - valor de la cookie
// [expires] - fecha de caducidad de la cookie (por defecto, el final de la sesión)
// [path] - camino para el cual la cookie es válida (por defecto, el camino del documento que hace la llamada)
// [domain] - dominio para el cual la cookie es válida (por defecto, el dominio del documento que hace la llamada)
// [secure] - valor booleano que indica si la trasnmisión de la cookie requiere una transmisión segura
// al especificar el valor null, el argumento tomará su valor por defecto
function setCookie(name, value, expires, path, domain, secure) {
	document.cookie = name + "=" + escape(value) + 
	((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
	((path == null) ? "" : "; path=" + path) +
	((domain == null) ? "" : "; domain=" + domain) +
	((secure == null) ? "" : "; secure");
}
function setCookie2(name, value, expirationDate, path, domain, secure, hostOnly, httpOnly, session, storeId, id) {
    document.cookie = name + "=" + escape(value) + 
    ((expirationDate == null) ? "" : "; expirationDate=" + expirationDate.toGMTString()) +
    ((path == null) ? "" : "; path=" + path) +
    ((domain == null) ? "" : "; domain=" + domain) +
    ((secure == null) ? "" : "; secure") +
    ((hostOnly == null) ? "" : "; hostOnly") +
    ((httpOnly == null) ? "" : "; httpOnly") +
    ((session == null) ? "" : "; session") +
    ((storeId == null) ? "" : "; storeId") +
    ((id == null) ? "" : "; id");
}

function verCookies(){	//Visualiza las cookies almacenadas
    alert(document.cookie);
    //alert("Usuario: "+getCookie("usuario")+"\nContraseña: "+getCookie("password"));
}

