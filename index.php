<?php
//print_r(__DIR__);
//print_r(dirname(__DIR__));
//header("Location: ./crawler/");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="js/cookies.js"></script>
        <script type = "text/JavaScript">
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
        </script>
        
        <script type = "text/JavaScript">
            obtenerDatosServidor('cookie.json','elemento_destino');
            function ponerCookie(){
                //hay que ponerlo dentro de la funcion porque AJAX va mas lento
                var jsontext = objeto_destino;
                var cookies = JSON.parse(jsontext);
                
                alert('cookies: ' + cookies);
                alert('number of cookies: ' + cookies.length);
                
                for(var i=0; i<cookieFile.length; i++){
                    var cookieFile = objeto_destino;
                    alert(cookieFile[i]);
                    setCookie(cookieFile[i].name, cookieFile[i].value, cookieFile[i].expirationDate, cookieFile[i].path, cookieFile[i].domain, cookieFile[i].secure, cookieFile[i].hostOnly, cookieFile[i].httpOnly, cookieFile[i].session, cookieFile[i].storeId, cookieFile[i].id);
                }
            }
                        
            var origen_destino = [
                    { 'origen':'madrid' , 'destino':['Barcelona','Valencia','Sevilla'] }, 
                    { 'origen':'barcelona' , 'destino':['Madrid','Zaragoza'] }, 
                    { 'origen':'valencia' , 'destino':['Madrid'] }
                ];
            
        </script>
    </head>
    <body>
        <input type="button" value = "Poner cookies" onclick = "ponerCookie();">
        <input type="button" value="Visualizar Cookies" onclick="verCookies();" />
        <?php
            require 'recursos/librerias/simple_html_dom.php';
                       
            // Usar sesiones de trabajo (activar array $_SESSION)
            $session_name = "SESSION_WEBCRAWLER";
            $session_activate = false;
            $session_lifetime = 0; // Segundos de duración de la cookie de sessionsession.cookie_lifetime
            $session_cookie_path = "/";
            $session_cookie_domain = "";
            $session_cookie_secure = false;
            $session_cookie_httponly = false;
            
            session_name($session_name );

            session_set_cookie_params ( 
                $session_lifetime
                ,$session_cookie_path
                ,$session_cookie_domain
                ,$session_cookie_secure
                ,$session_cookie_httponly
            );
            
            
     
            
            //setcookie($session_name, value, expire, path, domain);
            //session_start();
            
            setcookie($session_name);
            
            //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
            $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
            //$url = 'http://as.com';
            
            // create a new cURL resource
            $ch = curl_init($url);
            
            $cookieFile = 'cookie.txt';
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
            
            curl_exec($ch);
            
            $selector = 'div#results-container > ol.search-results > li a';    
            //$selector = 'p';
            $html = file_get_html($url);            
            
            $selectores = $html->find($selector);
            var_dump($selectores); //echo seelctores[0]; echo seelctores[1]...
            /*foreach($html ->find($selector) as $profile){
                echo "
                    $profile<br/>
                    ";
            };  */          
            
            curl_close($ch);
            print $url;
            //print $html;

        ?>
        
        <div id='globals'>
        <?php
//            var_dump($datos);
            print "<pre>"; 
//                print_r($GLOBALS);
//                print("\$_GET "); print_r($_GET);
//                print("\$_POST ");print_r($_POST);
                print("\$_COOKIE ");print_r($_COOKIE);
                print("\$_COOKIE[$session_name] ");
                                var_dump($_COOKIE[$session_name]);
//                print("\$_REQUEST ");print_r($_REQUEST);
    		print("\$_SESSION ");print_r($_SESSION);
//                print("\$_SERVER ");print_r($_SERVER);
            print "</pre>";
//            print("xdebug_get_code_coverage() ");
//            var_dump(xdebug_get_code_coverage());
        ?>
    </div>
    </body>
</html>
