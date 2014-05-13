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
            //$url = 'http://as.com';
            
            $html = file_get_html($url);
            
            $selector = 'div#results-container > ol.search-results > li a';    
            
            foreach($html ->find($selector) as $profile){
                echo "
                    $profile<br/>
                    ";
            };
            
            print $url;
            //print $html;

        ?>
    </body>
</html>
