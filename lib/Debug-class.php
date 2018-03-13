<?php

class Debug
{
    

    public static function ExecuteTime(){
        return  "<br>Process Time: " . number_format( ( (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000), 2) . "ms";
    }
}