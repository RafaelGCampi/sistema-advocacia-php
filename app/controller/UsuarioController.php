<?php

namespace app\controller;

use app\core\Controller;
use app\model\Usuario;
use app\dao\UsuarioDAO;

require_once('app/model/Usuario.php');
require_once('app/dao/UsuarioDAO.php');
require_once ('app/core/Controller.php');

class UsuarioController extends Controller {

    public function index(){
        $_REQUEST['title_page'] = 'Catálogo de Usuarios';
        $usuarioDao = new UsuarioDAO();
        $usuarios = $usuarioDao->findAll();

        $_REQUEST['usuarios'] = $usuarios;
        $this->render('adminview//usuario//index.php', 'app_adminview.php');
    }

    public function create(){
        $_REQUEST['title_page'] = 'Adicionar';
        $usuario = new Usuario();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if($_POST['senha'] !=$_POST['confirmar_senha']){
                $_REQUEST['error_messages'] =  array("Senha não conferem.");
                return $this->index();
            }

            $usuario->setNome($_POST['nome']);
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);
            
            if ($usuario->is_valid()) {
                $usuarioDAO = new UsuarioDAO();
                if ($usuarioDAO->save($usuario)){
                    $_REQUEST['success_messages'] =  array("O usuario foi cadastrado com sucesso.");
                    return $this->index();
                }
            } else{
                $_REQUEST['error_messages'] = $usuario->getErrors();
            }
        }
        $_REQUEST['usuario'] = $usuario;
        $this->render('adminview//usuario//create.php', 'app_adminview.php');
    }

    public function delete(){
        $usuario_id = $_POST['usuario_id'];
        if (($_SERVER['REQUEST_METHOD'] == 'POST')
            AND (isset($usuario_id))
            AND is_numeric($usuario_id)) {

            $usuarioDAO = new UsuarioDAO();
            if ($usuarioDAO->delete($usuario_id)){
                $_REQUEST['success_messages'] =  array("O usuario $usuario_id foi deletado com sucesso.");
            } else {
                $_REQUEST['error_messages'] = array("O usuario não foi deletado.");
            }
        }
        $this->index();
    }

    public function edit(){
        if (($_SERVER['REQUEST_METHOD'] == 'GET')
            AND isset($_GET['usuario_id'])){
            $_REQUEST['title_page'] = 'Editar';
            $usuarioDAO = new UsuarioDAO();
            $usuario_id = (int) $_GET['usuario_id'];
            $_REQUEST['usuario'] = $usuarioDAO->findById($usuario_id);
            return $this->render('adminview//usuario//edit.php', 'app_adminview.php');
        }
        $_REQUEST['error_messages'] = array('Nenhum usuario foi selecionado.');
        $this->index();
    }

    public function update(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')
            AND isset($_POST['usuario_id'])){
            $usuarioDAO = new UsuarioDAO();
            $usuario_id = (int) $_POST['usuario_id'];
            $usuario = $usuarioDAO->findById($usuario_id);
            $usuario->setUsuario($_POST['usuario']);
            $usuario->setSituacao_id($_POST['situacao_id']);
            $usuario->setTipo_usuario_id($_POST['tipo_usuario_id']);
            $usuario->setObservacao($_POST['observacao']);
            $usuario->setDate($_POST['date']);
            
            if ($usuario->is_valid()) {
                if ($usuarioDAO->update($usuario, $usuario_id)){
                    $_REQUEST['success_messages'] =  array("O usuario foi atualizado com sucesso.");
                }
            } else{
                $_REQUEST['error_messages'] = $usuario->getErrors();
                $_REQUEST['usuario'] = $usuario;
                return $this->render('adminview//usuario//edit.php', 'app_adminview.php');
            }
        }
        return $this->index();
    }
}