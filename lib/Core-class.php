<?php

abstract class Core
{
    protected static $Controller = null,
                     $Layout     = null,
                     $Model      = null,
                     $View       = null;
    
    protected static function CanLoadController(string $controller) : bool
    {
        $controller = ucfirst($controller);
        $controllerName = str_replace('\\', '/', $controller);
        $file = str_replace('Controller', '', $controller);
        foreach(glob(__ROOT__ . DS  . 'controllers' . DS . '{*['.$file.']*,*'.DS.'*['.$file.']*}',GLOB_BRACE ) as $config)
        {
            //echo '<br>GLOB: | ' , $config, ' | preg_M: ', preg_match('/'.$file.'*/', $config);
            if(preg_match('/'.$file.'*/', $config) && file_exists($config)){
               require_once $config;
               if(class_exists($controller))
               {
                   self::$Controller = new $controllerName();
                   return (self::$Controller instanceof $controllerName);
               }
           } 
        }
        return false;
    }


    public static function CanLoadView(string $folder, string $view) : bool
    {
        if(file_exists( $folder. $view)){
            self::$View = $view;
            return true;
		} else {
            throw new Exception('View loading error: '. $folder .  $view);
            return false;
        }
        return false;
    }

    public static function CanLoadModel(string $model) : bool
    {
        return (file_exists( __ROOT__ . DS  . 'models' . DS . $model . '.model.php'));
    }

    protected static function file_get_php_classes($filepath) {
        $php_code = file_get_contents($filepath);
        $classes = self::get_php_classes($php_code);
        return $classes;
      }

      protected static function get_php_classes($php_code) {
        //$classes = array();
        $tokens = token_get_all($php_code);
        $count = count($tokens);
        for ($i = 2; $i < $count; $i++) {
          if (   $tokens[$i - 2][0] == T_CLASS
              && $tokens[$i - 1][0] == T_WHITESPACE
              && $tokens[$i][0] == T_STRING) {
      
              $class_name = $tokens[$i][1];
              $classes = $class_name;
          }
        }
        return $classes;
      }
}
