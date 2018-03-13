<?php

class View extends Core
{
    private static $DATA = null;

    public static function GetData()
    {
        return self::$DATA;
    }

    public static function Layout() : string
    {
        try
        {
            $Layout = &self::$Layout;
            if(file_exists(Router::GetViewFolder() . $Layout))
            {
                return Router::GetViewFolder() . $Layout;
            }
        }
        catch(Exception $err)
        {
            throw new Exception("Error in layout rendering! " . $err->getMessage());
        }
    }

    public static function Render() : string
    {
        try
        {
            $model = str_replace('.view.php', '', self::$View);
            $Formattedmodel = str_replace('\\', '\\\\',$model);
            foreach(glob(__ROOT__ . DS  . 'models' . DS . '{*.model.php,*'.DS.'*.model.php}',GLOB_BRACE ) as $modelFile)
            {
                //echo '<br>File: ',$modelFile,' | preg_M: ', preg_match('/'.$model.'/', $modelFile);
                if(preg_match('/'.$Formattedmodel.'/', $modelFile) && file_exists($modelFile)){
                    require_once $modelFile;
                    $modelClass = self::file_get_php_classes($modelFile);
                    self::$Model = new $modelClass();
                    self::$DATA = call_user_func([self::$Model, '__construct']);
                }
            }
            
            return Router::GetViewFolder() . self::$View;
        }
        catch(Exception $err)
        {
            echo '<br>MODEL : ', var_dump($model);
            
            // echo '<br>ERR : ', var_dump($err);
            //echo '<br>GLOB: | ' ,var_dump(glob(__ROOT__ . DS  . 'models' . DS . '{*.model.php,*'.DS.'*.model.php}',GLOB_BRACE )), ' | preg_M: ', preg_match('/'.$model.'*/', $config);
        }
    }

    public static function UseController()
    {
        return self::$Controller;
    }
  
}
