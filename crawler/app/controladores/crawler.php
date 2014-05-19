<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crawler
 *
 * @author Jorge
 */
class crawler {
        
    //public static $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
    //public static $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
    public static $url = 'http://as.com';
    //public static $selector = 'div#results-container > ol.search-results > li a';
    public static $selector = 'p';
    //put your code here
    public function index(array $datos){
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal',$datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }
    
    public function result_search($url, $search){
        
        //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
        //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
        $url = 'http://as.com';
        
        $html = file_get_html($url);
        
        curl_setopt($s,CURLOPT_COOKIEFILE,$this->_cookieFileLocation);

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


}

?>
