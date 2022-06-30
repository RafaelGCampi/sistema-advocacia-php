<?php

namespace app\dao;

use app\config\Database;
use app\model\Processo;

require_once ('app/config/Database.php');
require_once ('app/model/Processo.php');

class ProcessoDAO {

   protected $database;

    function __construct() {
        $this->database = new Database();
    }

    public function findById($processo_id){
        $query = "SELECT * FROM processo WHERE id_processo = $processo_id";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Processo')){
            return $result;
        } else{
            return false;
        }
    }

    public function findAll(){
        $query = "SELECT * FROM processo";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Processo')){
            return $result;
        } else{
            return false;
        }
    }

    public function save(Processo $processo){
        $query = "
            INSERT INTO processo (
                processo,
                situacao_id, 
                tipo_processo_id, 
                observacao, 
                date,
                cliente_id
            ) VALUES (
                '".$processo->getProcesso()."',
                ".$processo->getSituacao_id().", 
                ".$processo->getTipo_processo_id().", 
                '".$processo->getObservacao()."', 
                '".$processo->getDate()."',
                ".$processo->getCliente_id()."
            )";
            var_dump($query);
        try{
            $sth = $this->database->connectPDO()->prepare($query);
            
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function delete($processo_id) {
        $query = "DELETE FROM processo WHERE id_processo = $processo_id";
        $sth = $this->database->connectPDO()->prepare($query);
        try {
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(Processo $processo, $processo_id){
        $query = "UPDATE processo SET 
                processo = ".$processo->getProcesso().", 
                situacao_id = ".$processo->getSituacao_id().", 
                tipo_processo_id = ".$processo->getTipo_processo_id().", 
                observacao = '".$processo->getObservacao()."', 
                date = '".$processo->getDate()."'
            WHERE (id_processo = ".$processo_id.")";
            var_dump($query);
        try {
            $sth = $this->database->connectPDO()->prepare($query);
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function findWithClient($id_cliente){
        $query = "SELECT * FROM processo";
        //SELECT p.* FROM `sistema-advocacia`.cliente_processo as cp left join processo as p on cp.processo_id = p.processo where cp.cliente_id=1;
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Processo')){
            return $result;
        } else{
            return false;
        }
    }

    public function clienteProcesso($id_cliente){
        $query = "SELECT * FROM processo WHERE cliente_id='$id_cliente' ORDER BY id_processo DESC limit 1";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Processo')){
            return $result;
        } else{
            return false;
        }
    }

    public function clienteProcessos($id_cliente){
        $query = "SELECT * FROM processo WHERE cliente_id=$id_cliente ORDER BY id_processo DESC";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS,'app\\model\\Processo')){
            return $result;
        } else{
            return false;
        }
    }

}