<?php

namespace app\dao;

use app\config\Database;
use app\model\Cliente;

require_once ('app/config/Database.php');
require_once ('app/model/Cliente.php');

class ClienteDAO {

   protected $database;

    function __construct() {
        $this->database = new Database();
    }

    public function findById($cliente_id){
        $query = "SELECT * FROM cliente WHERE id_cliente = :cliente_id";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->bindValue(':cliente_id', $cliente_id, \PDO::PARAM_INT);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Cliente')){
            return $result;
        } else{
            return false;
        }
    }

    public function findAll(){
        $query = "SELECT * FROM cliente";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Cliente')){
            return $result;
        } else{
            return false;
        }
    }

    public function save(Cliente $cliente){
        $query = "
            INSERT INTO cliente (
                nome,
                cpf, 
                estado_civil, 
                profissao, 
                escolaridade,
                data_nasc,
                sexo,
                ativo
            ) VALUES (
                '".$cliente->getNome()."',
                '".$cliente->getCpf()."', 
                '".$cliente->getEstado_civil()."', 
                '".$cliente->getProfissao()."', 
                '".$cliente->getEscolaridade()."',
                '".$cliente->getData_nasc()."',
                '".$cliente->getSexo()."',
                1
            )";
        try{
            $sth = $this->database->connectPDO()->prepare($query);
           
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    
    public function delete($cliente_id) {
        $query = "DELETE FROM cliente WHERE id_cliente =$cliente_id";
        $sth = $this->database->connectPDO()->prepare($query);
        //$sth->bindValue(':cliente_id', $cliente_id, \PDO::PARAM_INT);
        try {
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(Cliente $cliente, $cliente_id){
        $query = "UPDATE cliente SET  
            nome ='".$cliente->getNome()."',
            cpf = '".$cliente->getCpf()."',
            estado_civil = '".$cliente->getEstado_civil()."', 
            profissao = '".$cliente->getProfissao()."', 
            escolaridade = '".$cliente->getEscolaridade()."',
            data_nasc = '".$cliente->getData_nasc()."', 
            sexo = '".$cliente->getSexo()."', 
            ativo = 1
            WHERE (id_cliente = ".$cliente_id.")";
        try {
            $sth = $this->database->connectPDO()->prepare($query);
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}