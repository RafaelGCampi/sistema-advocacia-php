<?php

namespace app\core;

abstract class Route{
    protected $routes;

    public function __construct(){
        $this->setAllowInitialRoutes();
        $this->execute($this->getUrl());
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes($routes){
        $this->routes = $routes;
    }

    abstract public function setAllowInitialRoutes();

    protected function execute($url){
        if (array_key_exists($url, $this->getRoutes())){
            $classController = "\\app\\controller\\" . $this->routes[$url]['controller'];
            $controller = new $classController;
            $action = $this->routes[$url]['action'];
            $controller->$action();
        } else{
            include_once 'resources//templates//error//404.php';
        }
    }

    public function getUrl(){
        $request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace(BASE_DIR, '', $request_url);
        return $url;
    }

    public function redirect($route){
        
    }
}