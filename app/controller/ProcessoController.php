<?php

namespace app\controller;

use app\core\Controller;
use app\model\Processo;
use app\dao\ProcessoDAO;

require_once('app/model/Processo.php');
require_once('app/dao/ProcessoDAO.php');
require_once ('app/core/Controller.php');

class ProcessoController extends Controller {

  

    public function store(){
        $processo = new Processo();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['cliente_id']){
            $processo->setProcesso($_POST['processo']);
            $processo->setSituacao_id($_POST['situacao']);
            $processo->setTipo_processo_id($_POST['tipo_processo']);
            $processo->setObservacao($_POST['observacao']);
            $processo->setDate($_POST['date']);
            $processo->setCliente_id(intval($_GET['cliente_id']));
            if ($processo->is_valid()) {
                $processoDAO = new ProcessoDAO();
                if ($processoDAO->save($processo)){
                    echo "O processo foi cadastrado com sucesso.";
                }
            } else{
               echo "Ocorreu um erro";
            }
        }
    }

    public function delete(){
        $processo_id = $_GET['processo_id'];
        if (($_SERVER['REQUEST_METHOD'] == 'DELETE')
            AND  $_GET['processo_id']) {

            $processoDAO = new ProcessoDAO();
            if ($processoDAO->delete($processo_id)){
                $_REQUEST['success_messages'] =  array("O processo $processo_id foi deletado com sucesso.");
            } else {
                $_REQUEST['error_messages'] = array("O processo não foi deletado.");
            }
        }
        
    }

    public function edit(){
        if (($_SERVER['REQUEST_METHOD'] == 'GET')
            AND isset($_GET['processo_id'])){
            $processoDAO = new ProcessoDAO();
            $processo_id = (int) $_GET['processo_id'];
            $_REQUEST['processo'] = $processoDAO->findById($processo_id);
            $processo= $_REQUEST['processo'];
            echo $processo->serialize();
        }
        /* $_REQUEST['error_messages'] = array('Nenhum cliente foi selecionado.');
        $this->index(); */
    }

    public function update(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')
            AND isset($_GET['processo_id'])){
            $processoDAO = new ProcessoDAO();
            $processo_id = (int) $_POST['processo_id'];
            $processo = new Processo();
            $processo->setProcesso($_POST['processo']);
            $processo->setSituacao_id($_POST['situacao']);
            $processo->setTipo_processo_id($_POST['tipo_processo']);
            $processo->setObservacao($_POST['observacao']);
            $processo->setDate($_POST['date']);
            
            if ($processo->is_valid()) {
                if ($processoDAO->update($processo, $processo_id)){
                    echo "O processo foi atualizado com sucesso.";
                }
            } else{
                $_REQUEST['error_messages'] = $processo->getErrors();
                $_REQUEST['processo'] = $processo;
                echo "Ocorreu um erro.";
            }
        }
        
    }

    public function form(){
        include './resources/templates/view/processos/form.php';
    }
}