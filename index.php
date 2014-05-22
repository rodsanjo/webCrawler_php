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
        <script type="text/javascript" src="recursos/js/cookies.js"></script>
        <script type = "text/javascript" src="recursos/js/ajax_cookies.js"></script>
        
        <script type = "text/JavaScript">
            var ruta = 'recursos/files/cookie.json';
            obtenerDatosServidor(ruta,'elemento_destino');
            function ponerCookies(){
                //hay que ponerlo dentro de la funcion porque AJAX va mas lento
                var jsontext = objeto_destino;
                var cookies = JSON.parse(jsontext); //pasamos string a json
                
                alert('cookies: ' + cookies);
                //alert('cookies1: ' + cookies[1].name);
                alert('number of cookies: ' + cookies.length);
                
                for(var i=0; i<cookies.length; i++){
                    //alert(cookies[i].name);
                    //alert(document.cookie);
                    //setCookie(cookies[i].name, cookies[i].value, null, cookies[i].path, cookies[i].domain  );
                    setCookie2(cookies[i].name, cookies[i].value, null, cookies[i].path, cookies[i].domain, cookies[i].secure, cookies[i].hostOnly, cookies[i].httpOnly, cookies[i].session, cookies[i].storeId, cookies[i].id);
                }
                
                alert(document.cookie);
            }
            
        </script>
    </head>
    <body>
        <input type="button" value = "Set cookies" onclick = "ponerCookies();">
        <input type="button" value="See Cookies" onclick="verCookies();" />
        <div style="background: blue;"><input type="button" value="Look for" onclick="Search();" /></div>
            
        <?php
            require 'recursos/librerias/simple_html_dom.php';
 
            //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
            $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
            //$url = 'http://as.com';
            
            // create a new cURL resource
            $ch = curl_init($url);
            
            $cookiesArray = $_COOKIE; //document.cookie;
            //var_dump($cookiesArray);
            $cookiesString = '';//convertimos a Array
            foreach ($cookiesArray as $cookieName => $cookieValue) {
                $cookiesString .= $cookieName.'='.$cookieValue.';';
            } 
            //var_dump($cookiesString);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiesString);
            
            curl_exec($ch);
            
            $url = 'http://as.com';
            $selector = 'div#results-container > ol.search-results > li a';    
            $selector = 'p';
            $html = file_get_html($url);            
            
            $selectores = $html->find($selector);
            var_dump($selectores); //echo seelctores[0]; echo seelctores[1]...
            /*foreach($html ->find($selector) as $profile){
                echo "
                    $profile<br/>
                    ";
            };  */          
            /*
            curl_close($ch);
            print $url;
            //print $html;
*/
        ?>
        
        <div id='globals'>
        <?php
//            var_dump($datos);
            print "<pre>"; 
//                print_r($GLOBALS);
//                print("\$_GET "); print_r($_GET);
//                print("\$_POST ");print_r($_POST);
                print("\$_COOKIE ");print_r($_COOKIE);
//                print("\$_COOKIE[$session_name] ");
//                                var_dump($_COOKIE[$session_name]);
//                print("\$_REQUEST ");print_r($_REQUEST);
//    		print("\$_SESSION ");print_r($_SESSION);
//                print("\$_SERVER ");print_r($_SERVER);
            print "</pre>";
//            print("xdebug_get_code_coverage() ");
//            var_dump(xdebug_get_code_coverage());
        ?>
    </div>
        
        <?php
        // Usar sesiones de trabajo (activar array $_SESSION)
            $session_name = "SESSION_WEBCRAWLER";
            $session_activate = false;
            $session_lifetime = 0; // Segundos de duración de la cookie de sessionsession.cookie_lifetime
            $session_cookie_path = "/";
            $session_cookie_domain = "";
            $session_cookie_secure = false;
            $session_cookie_httponly = false;
            
            //session_name($session_name );

            session_set_cookie_params ( 
                $session_lifetime
                ,$session_cookie_path
                ,$session_cookie_domain
                ,$session_cookie_secure
                ,$session_cookie_httponly
            );
            
            
     
            
            //setcookie($session_name, value, expire, path, domain);
            //session_start();
            
            //setcookie($session_name);
            ?>
    </body>
</html>
