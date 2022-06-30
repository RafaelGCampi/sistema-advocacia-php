<?php

namespace app\controller;

use app\core\Controller;
use app\dao\UsuarioDAO;
use app\model\Usuario;

require_once('app/dao/UsuarioDAO.php');
require_once ('app/core/Controller.php');
require_once('app/model/Usuario.php');

class FuncionarioController extends Controller {

    public function index(){
        $_REQUEST['title_page'] = 'Catálogo de Funcionarios';
        $funcionarioDao = new UsuarioDAO();
        $funcionarios = $funcionarioDao->findAll();

        $_REQUEST['funcionarios'] = $funcionarios;
        $this->render('funcionarios//index.php', 'frontview.php');
    }


    public function store(){
        $usuario = new Usuario();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $usuario->setNome($_POST['name']);
            $usuario->setLogin($_POST['login']);
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);
            $usuario->setTipo_funcionario($_POST['tipo_funcionario']);
            
            if ($usuario->is_valid()) {
                $usuarioDAO = new UsuarioDAO();
                if ($usuarioDAO->save($usuario)){
                   /*  $_REQUEST['success_messages'] =  array("O cliente foi cadastrado com sucesso.");
                    return $this->index(); */
                }
            } else{
               echo 'Erro';
            }
        }
        //$_REQUEST['cliente'] = $cliente;
        echo 'Sucesso';
    }

    public function desativar(){
        $funcionario_id = $_GET['funcionario_id'];
        $acao = $_GET['acao'];
        if (($_SERVER['REQUEST_METHOD'] == 'DELETE')
            AND (isset($funcionario_id))) {
            $ativarDesativar = $acao=='ativar'?1:0;

            $funcionarioDAO = new UsuarioDAO();
            if ($funcionarioDAO->ativarDesativar($funcionario_id,$ativarDesativar)){
                $_REQUEST['success_messages'] =  array("O funcionario $funcionario_id foi deletado com sucesso.");
            } else {
                $_REQUEST['error_messages'] = array("O funcionario não foi deletado.");
            }
        }
       echo "Funcinario desativado.";
    }

    public function form (){
        include './resources/templates/view/funcionarios/form.php';
    }
}