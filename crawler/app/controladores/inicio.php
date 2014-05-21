<?php
namespace controladores;

/**
 * Description of crawler
 *
 * @author Jorge
 */
class inicio extends \core\Controlador{
        
    //public static $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
    //public static $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
    public static $url = 'http://as.com';
    //public static $selector = 'div#results-container > ol.search-results > li a';
    public static $selector = 'p';
    public static $cookieFile = 'modelos/cookie.txt';


    public function index(array $datos){
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal',$datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }
    
    public function result_search($url = null, $search = null){
        
        //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
        //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
        $url = 'http://as.com';
        
        require_once(PATH_ROOT.'recursos/librerias/simple_html_dom.php');
        
        $html = file_get_html($url);
        //curl_setopt($s,CURLOPT_COOKIEFILE, PATH_APP.self::$cookieFile);

        //$selector = 'div#results-container > ol.search-results > li a';    
        $selector = 'p';

        foreach($html ->find($selector) as $profile){
            echo "
                $profile<br/>
                ";
        };

        print $url;
        //print $html;
    }


}   // Fin de la clase

?>
