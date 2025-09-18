<?php

class App
{
    private static $routes = ["GET" => [], "POST" => []];

    public static function get($path, $cb)
    {

        preg_match_all('/\{(.*?)\}/', $path, $matches);

        $params = $matches[1];

        // Konvertera vår path till ett reg-ex
        $regex = preg_replace('/\{(.*?)\}/', '([^/]+)', $path);
        $regex = "#^" . $regex . "$#";



        self::$routes["GET"][] = [
            "regex" => $regex,
            "params" => $params,
            "cb" => $cb
        ];
    }
    public static function post($path, $cb)
    {
        self::$routes["POST"][$path] = $cb;
    }

    public static function listen()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/router2025", "", $uri);
        $uri = explode("?", $uri)[0];

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route) {

            if (preg_match_all($route["regex"], $uri, $matches)) {

                array_shift($matches); // Tar bort första elementet ur array

                $params = array_map(function ($item) {
                    return $item[0];
                }, $matches);


                call_user_func_array($route["cb"], $params);
                return;
            }
        }
        include("404.html");
    }

    public static function debug($data)
    {

        echo "<pre>";
        var_dump($data);
        echo "</pre><hr>";
    }
}
