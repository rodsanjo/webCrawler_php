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
    </head>
    <body>

        <?php
            require 'recursos/librerias/simple_html_dom.php';
            
            //$url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=Symfony2+Gliwice';
            $url = 'https://www.linkedin.com/vsearch/f?type=all&keywords=php+jorge';
            $url = 'http://as.com';
            
            // create a new cURL resource
            $ch = curl_init($url);
            
            $cookieFile = './cookie.txt';
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
            
            curl_exec($ch);
            
            //$selector = 'div#results-container > ol.search-results > li a';    
            $selector = 'p';
            $html = file_get_html($url);            
            
            //$selectores = $html->find($selector);
            //var_dump($selectores); echo seelctores[0]; echo seelctores[1]...
            foreach($html ->find($selector) as $profile){
                echo "
                    $profile<br/>
                    ";
            };            
            
            curl_close($ch);
            print $url;
            //print $html;

        ?>
    </body>
</html>
