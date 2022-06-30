<?php

namespace app\controller;

use app\core\Controller;
use app\dao\UsuarioDAO;

require_once('app/core/Controller.php');
require_once('app/dao/UsuarioDAO.php');

class MeusDadosController extends Controller
{
    public function index()
    {

        $this->render('meus-dados//index.php', 'frontview.php');
    }

    public function makeLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->getLogin($_REQUEST['login']);

            if (crypt( 'teste',  $usuario->getSenha()) ==  $usuario->getSenha()) {
                
                session_start();
                $_SESSION['usuario']= $usuario;
                //var_dump($_SESSION['usuario']);
                header("Location: http://localhost:8000/home", 200);exit;
                //return $this->render('admin//home.php', 'frontview.php');
            } else {
                $_REQUEST['error_messages'] = array("Login ou senha incorretos.");
                return $this->render('login//index.php', 'login.php');
            }
        }
    }

    public function atualizaDados(){

    }

    public function atualizaSenha(){
        
    }
}
