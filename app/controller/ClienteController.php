<?php

namespace app\controller;

use app\core\Controller;
use app\model\Cliente;
use app\dao\ClienteDAO;

require_once('app/model/Cliente.php');
require_once('app/dao/ClienteDAO.php');
require_once ('app/core/Controller.php');

class ClienteController extends Controller {

    public function index(){
        $_REQUEST['title_page'] = 'Catálogo de Clientes';
        $clienteDao = new ClienteDAO();
        $clientes = $clienteDao->findAll();

        $_REQUEST['clientes'] = $clientes;
        $this->render('clientes//index.php', 'frontview.php');
    }

    public function store(){
        $_REQUEST['title_page'] = 'Adicionar';
        $cliente = new Cliente();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $cliente->setNome($_POST['nome']);
            $cliente->setCpf($_POST['cpf']);
            $cliente->setEstado_civil($_POST['estado_civil']);
            $cliente->setProfissao($_POST['profissao']);
            $cliente->setEscolaridade($_POST['escolaridade']);
            $cliente->setData_nasc($_POST['data_nascimento']);
            $cliente->setSexo($_POST['genero']);

            if ($cliente->is_valid()) {
                $clienteDAO = new ClienteDAO();
                if ($clienteDAO->save($cliente)){
                   /*  $_REQUEST['success_messages'] =  array("O cliente foi cadastrado com sucesso.");
                    return $this->index(); */
                }
            } else{
               echo 'Erro';
            }
        }
        $_REQUEST['cliente'] = $cliente;
        echo 'Sucesso';
        
    }

    public function delete(){
        //$cliente_id = $_POST['cliente_id'];
        if (($_SERVER['REQUEST_METHOD'] == 'DELETE')
            AND ( $_GET['cliente_id'])
            ) {
            $cliente_id = $_GET['cliente_id'];
            $clienteDAO = new ClienteDAO();

            if ($clienteDAO->delete($cliente_id)){
                echo "O cliente $cliente_id foi deletado com sucesso.";
            } else {
                echo "O cliente não foi deletado.";
            }
        }
    }

    public function edit(){
        if (($_SERVER['REQUEST_METHOD'] == 'GET')
            AND isset($_GET['cliente_id'])){
            $_REQUEST['title_page'] = 'Editar';
            $clienteDAO = new ClienteDAO();
            $cliente_id = (int) $_GET['cliente_id'];
            $_REQUEST['cliente'] = $clienteDAO->findById($cliente_id);
            $cliente= $_REQUEST['cliente'];
            echo $cliente->serialize();
        }
        /* $_REQUEST['error_messages'] = array('Nenhum cliente foi selecionado.');
        $this->index(); */
    }

    public function update(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')
            AND isset($_GET['cliente_id'])){
            $clienteDAO = new ClienteDAO();
            $cliente_id = (int) $_GET['cliente_id'];
            var_dump($cliente_id );
            $cliente = new Cliente();
        
            $cliente->setNome($_POST['nome']);
            $cliente->setCpf($_POST['cpf']);
            $cliente->setEstado_civil($_POST['estado_civil']);
            $cliente->setProfissao($_POST['profissao']);
            $cliente->setEscolaridade($_POST['escolaridade']);
            $cliente->setData_nasc($_POST['data_nascimento']);
            $cliente->setSexo($_POST['genero']);
            if ($cliente->is_valid()) {
                if ($clienteDAO->update($cliente, $cliente_id)){
                    echo "O cliente foi atualizado com sucesso.";
                }
            } else{
                echo "Erro ao atualizar cliente.";
            }
        }
    }

    public function form(){
        include './resources/templates/view/clientes/form.php';
    }

    public function perfilCliente(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['cliente_id']) ){
            $cliente_id = (int) $_GET['cliente_id'];
            $clienteDAO = new ClienteDAO();

            $_REQUEST['cliente'] = $clienteDAO->findById($cliente_id);
            $cliente= $_REQUEST['cliente'];
            
            $_REQUEST['processos'] = $cliente->processos();

           // var_dump($_REQUEST['processoss']); exit;

            $_REQUEST['enderecos'] = $cliente->enderecos();


            return $this->render('clientes//perfil.php', 'frontview.php');
        }
        
    }
}