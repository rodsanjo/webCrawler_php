<?php
//xdebug_start_code_coverage();
//print "<pre>"; print_r($GLOBALS); print "</pre>";

// Definiciones constantes
define("DS", DIRECTORY_SEPARATOR);

/**
 * @const strin Path donde están alojadas las aplicaciones
 */
define("PATH_ROOT", dirname(__DIR__).DS ); // Finaliza en DS
/**
 * @const string Path donde está alojada la aplicación que se ejecuta
 */
define("PATH_APPLICATION", __DIR__.DS);

// Path de la carpeta app de la aplicación que se ejecuta
define("PATH_APP", __DIR__.DS."app".DS ); // Finaliza en DS
define("PATH_APPLICATION_APP", __DIR__.DS."app".DS ); // Finaliza en DS

/**
 * @const string Path donde está alojada al aplicación home o framework
 */
define("PATH_HOME", dirname(__DIR__).DS."home".DS);

/**
 * Carpeta que aloja la aplicación que se ejecuta
 */
define("APPLICATION_FOLDER", str_replace(PATH_ROOT, "", __DIR__));

/**
 * URL_ROOT es la url que incluye esquema, servidor y carpeta en la que está alojada la aplicación o, lo que es equivalente, el fichero index.php que se ejecuta para arrancar la aplicación.
 */
define("URL_ROOT", (isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:($_SERVER['SERVER_PORT']==80?"http":"https"))."://".$_SERVER['SERVER_NAME'].str_replace("index.php", '', $_SERVER['SCRIPT_NAME'])); // Finaliza en DS

/**
 * URL_ROOT_URI es la url que incluye esquema, servidor y la uri.
 * ha sido creada por Jorge para que al cambiar de idioma nos mantenga en la misma página, y no vuelva al inicio
 */
define("URL_ROOT_URI", (isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:($_SERVER['SERVER_PORT']==80?"http":"https"))."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); // Finaliza en DS

define("URL_APPLICATION_ROOT", URL_ROOT);
define("URL_HOME_ROOT", dirname(URL_ROOT)."/home/");

//Titulo de la aplicación
define('TITULO', 'Web Crawler');

// Preparar el autocargador de clases.
// Este y el contenido en \core\Autoloader() serán los únicos require/include de toda la aplicación

require PATH_HOME.'app/core/autoloader.php'; 
//$autoloader = new \core\Autoloader();
$autoloader = new \core\Autoloader(array(APPLICATION_FOLDER => true));
//spl_autoload_register(array('\core\Autoloader', 'autoload'));

//require_once PATH_APP."core/aplicacion.php";
// Cargamos la aplicación
$aplicacion = new \core\Aplicacion();
//\core\Aplicacion::iniciar();

//print "<pre>"; print_r($_SESSION); print "</pre>";

// Fin de index.php