<?php

namespace app\dao;

use app\config\Database;
use app\model\Usuario;

require_once ('app/config/Database.php');
require_once ('app/model/Usuario.php');

class UsuarioDAO {

   protected $database;

    function __construct() {
        $this->database = new Database();
    }

    public function findById($usuario_id){
        $query = "SELECT * FROM usuarios WHERE usuario_id = :usuario_id";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->bindValue(':usuario_id', $usuario_id, \PDO::PARAM_INT);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Usuario')){
            return $result;
        } else{
            return false;
        }
    }

    public function findAll(){
        $query = "SELECT * FROM usuarios";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Usuario')){
            return $result;
        } else{
            return false;
        }
    }

    public function findAllEnabled(){
        $query = "SELECT * FROM usuarios WHERE ativo ='0'";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchAll(\PDO::FETCH_CLASS, 'app\\model\\Usuario')){
            return $result;
        } else{
            return false;
        }
    }

    public function getLogin($login){
        $query = "SELECT * FROM usuarios WHERE (login='$login' or email='$login') and ativo =1";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->execute();
        if($result = $sth->fetchObject('app\\model\\Usuario')){
            return $result;
        } else{
            return false;
        }
    }


    public function save(Usuario $usuario){
        $query = "
            INSERT INTO usuarios (
                login,
               
                nome, 
                email,
                tipo_funcionario
            ) VALUES (
                '".$usuario->getLogin()."',
                
                '".$usuario->getNome()."',
                '".$usuario->getEmail()."',
                '".$usuario->getTipo_funcionario()."'
            )";
            var_dump($query);
        try{
            $sth = $this->database->connectPDO()->prepare($query);
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function delete($usuario_id) {
        $query = "DELETE FROM usuarios WHERE usuario_id = :usuario_id";
        $sth = $this->database->connectPDO()->prepare($query);
        $sth->bindValue(':usuario_id', $usuario_id, \PDO::PARAM_INT);
        try {
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function ativarDesativar($usuario_id, $ativo){
        $query = "UPDATE  usuarios SET ativo=$ativo WHERE id = $usuario_id";
        var_dump($query);
        $sth = $this->database->connectPDO()->prepare($query);
        try {
            return $sth->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    
}