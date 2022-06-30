<?php


namespace app\core;

abstract class Controller{

    protected $view;

    public function content(){
        include $this->view;
    }

    public function head(){
        include "resources//templates//fragments//head.php";
    }

    public function render($view, $layout){
        
        $this->view = 'resources//templates//view//'.$view;
        include 'resources//templates//layout//'.$layout;
        
    }
}