<?php

class App{


    private static $routes = ["GET"=>[] , "POST"=>[] ];


    public static function get($path, $cb){
        self::$routes["GET"][$path] = $cb;

    }
    public static function post($path, $cb){
        self::$routes["POST"][$path] = $cb;
    }

    public static function listen(){


        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/router2025","",$uri);

        $uri = explode("?", $uri)[0];

        $method = $_SERVER['REQUEST_METHOD'];

        if(empty(self::$routes[$method][$uri]))
        {
            include("404.html");
            return;
        }
        
        $cb = self::$routes[$method][$uri];

            if(is_callable($cb))
            {

                if($method == "POST"){
                    call_user_func_array($cb, ["data"=>$_POST]);
                    return;
                }


                call_user_func($cb);
                return;
            }
        
  

        include("404.html");
    

    }

    public static function debug($data){

        echo "<pre>";
        var_dump($data);
        echo "</pre><hr>";

    }






}



