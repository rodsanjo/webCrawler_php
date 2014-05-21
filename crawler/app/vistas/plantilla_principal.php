<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo TITULO ?></title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME_ROOT ?>recursos/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT ?>recursos/css/main.css" />
        
        <script type="text/javascript" src="<?php echo URL_HOME_ROOT ?>recursos/js/jquery/jquery-1.10.2.js"></script>
    </head>
    <body>
        <h2>Web Crawler</h2>
        <div id="view_content">
            <?php
                echo $datos['view_content'];
            ?>
        </div>
        
         <div id="pie">
        <hr/><div>© skygate sellekt<br/>
            Diseñada por:<a href="mailto:jergo23@gmail.com" style="color:blue">Jergo</a><br/>
        </div>
    </div>
    
<?php
if (isset($_SESSION["alerta"])) {
    echo <<<heredoc
<script type="text/javascript" />
    alert("{$_SESSION["alerta"]}");
    var alerta = '{$_SESSION["alerta"]}';
</script>
heredoc;
    unset($_SESSION["alerta"]);
}
elseif (isset($datos["alerta"])) {
    echo <<<heredoc
<script type="text/javascript" />
    // alert("{$datos["alerta"]}");
    var alerta = '{$datos["alerta"]}';
</script>
heredoc;
}
?>	
	
    <div id='globals'>
        <?php
            var_dump($datos);
            print "<pre>"; 
//                print_r($GLOBALS);
//                print("\$_GET "); print_r($_GET);
//                print("\$_POST ");print_r($_POST);
                print("\$_COOKIE ");print_r($_COOKIE);
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
