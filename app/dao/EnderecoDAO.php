<?php

namespace app\dao;

use app\config\Database;
use app\model\Endereco;

require_once ('app/config/Database.php');
require_once ('app/model/Endereco.php');

class EnderecoDAO {

   protected $database;

    function __construct() {
        $this->database = new Database();
    }

    public function findById($endereco_id){
        $query = "SELECT * FROM endereco WHERE id_endereco = $endereco_id";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Endereco')){
            return $result;
        } else{
            return false;
        }
    }

    public function findAll(){
        $query = "SELECT * FROM endereco";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Endereco')){
            return $result;
        } else{
            return false;
        }
    }

    public function save(Endereco $endereco){
        $query = "
            INSERT INTO endereco (
                rua,
                numero, 
                cidade,
                bairro, 
                uf, 
                cep,
                telefone_residencial,
                telefone_celular,
                complemento,
                cliente_id
            ) VALUES (
                '".$endereco->getRua()."',
                ".$endereco->getNumero().", 
                '".$endereco->getCidade()."', 
                '".$endereco->getBairro()."',
                '".$endereco->getUf()."', 
                '".$endereco->getCep()."',
                '".$endereco->getTelefone_residencial()."',
                '".$endereco->getTelefone_celular()."',
                '".$endereco->getComplemento()."',
                ".$endereco->getCliente_id()."
            )";
            var_dump($query);
        try{
            $sth = $this->database->connectPDO()->prepare($query);
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function delete($endereco_id) {
        $query = "DELETE FROM endereco WHERE id_endereco = $endereco_id";
        $sth = $this->database->connectPDO()->prepare($query);
        try {
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(Endereco $endereco, $endereco_id){
        $query = "UPDATE endereco SET 
                rua = '".$endereco->getRua()."', 
                numero = ".$endereco->getNumero().", 
                bairro = '".$endereco->getBairro()."', 
                cidade = '".$endereco->getCidade()."', 
                uf = '".$endereco->getUf()."',
                cep='".$endereco->getCep()."',
                telefone_residencial='".$endereco->getTelefone_residencial()."',
                telefone_celular='".$endereco->getTelefone_celular()."',
                complemento='".$endereco->getComplemento()."',
                cliente_id=".$endereco->getCliente_id()."
            WHERE (id_endereco = ".$endereco_id.")";
            var_dump($query);
        try {
            $sth = $this->database->connectPDO()->prepare($query);
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function findWithClient($id_cliente){
        $query = "SELECT * FROM endereco";
        //SELECT p.* FROM `sistema-advocacia`.cliente_endereco as cp left join endereco as p on cp.endereco_id = p.endereco where cp.cliente_id=1;
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Endereco')){
            return $result;
        } else{
            return false;
        }
    }

    public function clienteEndereco($id_cliente){
        $query = "SELECT * FROM endereco WHERE cliente_id='$id_cliente' ORDER BY id_endereco DESC limit 1";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Endereco')){
            return $result;
        } else{
            return false;
        }
    }

    public function clienteEnderecos($id_cliente){
        $query = "SELECT * FROM endereco WHERE cliente_id=$id_cliente ORDER BY id_endereco DESC";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS,'app\\model\\Endereco')){
            return $result;
        } else{
            return false;
        }
    }
}