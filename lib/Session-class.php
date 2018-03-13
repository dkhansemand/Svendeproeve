<?php

class Session{

    public static function set(string $key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key)
    {
        if ( isset($_SESSION[$key]) )
        {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete(string $key) : void
    {
        if ( isset($_SESSION[$key]) )
        {
            unset($_SESSION[$key]);
        }
    }

}
