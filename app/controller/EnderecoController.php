<?php

namespace app\controller;

use app\core\Controller;
use app\model\Endereco;
use app\dao\EnderecoDAO;

require_once('app/model/Endereco.php');
require_once('app/dao/EnderecoDAO.php');
require_once ('app/core/Controller.php');

class EnderecoController extends Controller {

    public function store(){
        $endereco = new Endereco();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['cliente_id']){
            $endereco->setRua($_POST['rua']);
            $endereco->setCep($_POST['cep']);
            $endereco->setBairro($_POST['bairro']);
            $endereco->setCidade($_POST['cidade']);
            $endereco->setUf($_POST['uf']);
            $endereco->setComplemento($_POST['complemento']);
            $endereco->setNumero($_POST['numero_casa']);
            $endereco->setTelefone_celular($_POST['telefone_celular']);
            $endereco->setTelefone_residencial($_POST['telefone_residencial']);
            $endereco->setCliente_id(intval($_GET['cliente_id']));

            if ($endereco->is_valid()) {
                $enderecoDAO = new EnderecoDAO();
                if ($enderecoDAO->save($endereco)){
                    echo "O endereco foi cadastrado com sucesso.";
                }
            } else{
               echo "Ocorreu um erro";
            }
        }
    }

    public function delete(){
        $endereco_id = $_GET['endereco_id'];
        if (($_SERVER['REQUEST_METHOD'] == 'DELETE')
            AND  $_GET['endereco_id']) {

            $enderecoDAO = new EnderecoDAO();
            if ($enderecoDAO->delete($endereco_id)){
                $_REQUEST['success_messages'] =  array("O endereco $endereco_id foi deletado com sucesso.");
            } else {
                $_REQUEST['error_messages'] = array("O endereco não foi deletado.");
            }
        }
        
    }

    public function edit(){
        if (($_SERVER['REQUEST_METHOD'] == 'GET')
            AND isset($_GET['endereco_id'])){
            $enderecoDAO = new EnderecoDAO();
            $endereco_id = (int) $_GET['endereco_id'];
            $_REQUEST['endereco'] = $enderecoDAO->findById($endereco_id);
            $endereco= $_REQUEST['endereco'];
            echo $endereco->serialize();
        }
        /* $_REQUEST['error_messages'] = array('Nenhum cliente foi selecionado.');
        $this->index(); */
    }

    public function update(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')
            AND isset($_GET['endereco_id'])){
            $enderecoDAO = new EnderecoDAO();
            $endereco_id = (int) $_GET['endereco_id'];
            $endereco = new Endereco();

            $endereco->setRua($_POST['rua']);
            $endereco->setCep($_POST['cep']);
            $endereco->setBairro($_POST['bairro']);
            $endereco->setCidade($_POST['cidade']);
            $endereco->setUf($_POST['uf']);
            $endereco->setComplemento($_POST['complemento']);
            $endereco->setNumero($_POST['numero_casa']);
            $endereco->setTelefone_celular($_POST['telefone_celular']);
            $endereco->setTelefone_residencial($_POST['telefone_residencial']);
            $endereco->setCliente_id(intval($_GET['cliente_id']));

            var_dump($endereco);

            if ($endereco->is_valid()) {
                if ($enderecoDAO->update($endereco, $endereco_id)){
                    echo "O endereco foi atualizado com sucesso.";
                }
            } else{
                $_REQUEST['error_messages'] = $endereco->getErrors();
                $_REQUEST['endereco'] = $endereco;
                echo "Ocorreu um erro.";
            }
        }
        
    }

    public function form(){
        include './resources/templates/view/enderecos/form.php';
    }
}