<?php

class Config{

    protected static $settings = array();

    public static function get($key) : string
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    public static function set($key, $value) : void
    {
        self::$settings[$key] = $value;
    }

    public static function LocateFiles(string $dir) : array
    {
        try
        {
            if(is_dir($dir)){
                return glob($dir . '*.config.php');
            }
        }
        catch(Exception $e)
        {
            return ['error'];
        }
        return [];
    }

}
