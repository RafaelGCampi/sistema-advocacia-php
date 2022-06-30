<?php

namespace app\model;

use app\core\Model;

require_once ('app/core/Model.php');

class Usuario extends Model {
    private $id,$login, $senha, $nome,  $email,$tipo_funcionario, $ativo, $created_at, $updated_at;
    public function is_valid(){
        return count($this->errors) === 0;
    }

    public function getLogin(){
        return $this->login;

    }

    public function setLogin($login){
        $this->login=$login;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = crypt($senha);
    }
  
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

  
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }



 
    public function getEmail()
    {
        return $this->email;
    }

 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    public function setData_nasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;

        return $this;
    }

 
    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }


    public function getCreated_at()
    {
        return $this->created_at;
    }


    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of tipo_funcionario
     */ 
    public function getTipo_funcionario()
    {
        return $this->tipo_funcionario;
    }

    /**
     * Set the value of tipo_funcionario
     *
     * @return  self
     */ 
    public function setTipo_funcionario($tipo_funcionario)
    {
        $this->tipo_funcionario = $tipo_funcionario;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
