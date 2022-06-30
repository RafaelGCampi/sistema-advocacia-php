<?php

namespace app\controller;

use app\core\Controller;

require_once ('app/core/Controller.php');

class AppController extends Controller {
    public function index(){
        if($_SESSION['usuario']){
            $this->render('admin//index.php','home.php');
        }
        else{
            $this->render('login//index.php','login.php');
        }
    }

    public function home(){
        if($_SESSION['usuario']){
            $this->render('admin//index.php','frontview.php');
        }
        else{
            $this->render('login//index.php','login.php');
        }
    }
}