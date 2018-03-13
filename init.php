<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    define('__DEBUG__', false);
    define('__ROOT__', __DIR__);
    define('DS', DIRECTORY_SEPARATOR);
	define('_JWTKEY_', 'ac669daa7a8991150cf378b2880f4d6a9f04ebc0be676bd6af4fc476765a8069');
    define('_AUTOLOADER_', __DIR__ . DS . 'vendor' . DS . 'autoload.php');

    session_start();
    
    ## Auto class loader from folder '/lib'
    ## Class autoloader
    spl_autoload_register(function ($className){
		$className = str_replace('\\', '/', $className);
		if(file_exists(__DIR__ . DS  . 'lib' . DS . $className . '-class.php')){
			require_once __DIR__  . DS . 'lib'. DS . $className . '-class.php';
		} else {
			throw new Exception('ERROR: '. __DIR__ . DS . 'lib' . DS .  $className . '-class.php');
		}
    });
        
    $GET  = Filter::CheckMethod('GET')  ? Filter::SanitizeArray(INPUT_GET)  : null;
    $POST = Filter::CheckMethod('POST') ? Filter::SanitizeArray(INPUT_POST) : null;

    foreach(Config::LocateFiles(__ROOT__ . DS . 'config' . DS) as $configFile)
    {
        require_once $configFile;
    }
    