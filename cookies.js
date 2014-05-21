// name - nombre de la cookie
// value - valor de la cookie
// [expires] - fecha de caducidad de la cookie (por defecto, el final de la sesión)
// [path] - camino para el cual la cookie es válida (por defecto, el camino del documento que hace la llamada)
// [domain] - dominio para el cual la cookie es válida (por defecto, el dominio del documento que hace la llamada)
// [secure] - valor booleano que indica si la trasnmisión de la cookie requiere una transmisión segura
// al especificar el valor null, el argumento tomará su valor por defecto
function setCookie(name, value, expirationDate, path, domain, secure, hostOnly, httpOnly, session, storeId, id) {
    document.cookie = name + "=" + escape(value) + 
    ((expirationDate == null) ? "" : "; expirationDate=" + expirationDate.toGMTString()) +
    ((path == null) ? "" : "; path=" + path) +
    ((domain == null) ? "" : "; domain=" + domain) +
    ((secure == null) ? "" : "; secure" + secure) +
    ((hostOnly == null) ? "": "; hostOnly=" + hostOnly) +
    ((httpOnly == null) ?"" : "; httpOnly=" + httpOnly) +
    ((session == null) ? "" : "; session=" + session) +
    ((storeId == null) ? "" : "; storeId=" + storeId) +
    ((id == null) ? "" : "; domain=" + id);
}
function verCookies(){	//Visualiza las cookies almacenadas
    alert(document.cookie);
    //alert("Usuario: "+getCookie("usuario")+"\nContraseña: "+getCookie("password"));
}

