<?php


class Base{

private static $base = "";

    
    public static function url($url){

        self::$base = str_replace("index.php","",$_SERVER["PHP_SELF"]);
        echo self::$base . $url;

    }

}


