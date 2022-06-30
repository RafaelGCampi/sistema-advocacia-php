<?php

namespace app\model;

use app\core\Model;
use app\dao\EnderecoDAO;
use app\dao\ProcessoDAO;

require_once ('app/dao/EnderecoDAO.php');
require_once ('app/dao/ProcessoDAO.php');

require_once ('app/core/Model.php');

class Cliente extends Model {
    private $id_cliente,$nome,$cpf,$estado_civil,$profissao,$escolaridade,$data_nasc,$sexo,$ativo,$created_at,$deleted_at;

    public function is_valid(){
        $this->isNotNull("nome",$this->getNome());
        $this->isNotBlank("nome",$this->getNome());
        return count($this->errors) === 0;
    }

  

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }


    /**
     * Get the value of estado_civil
     */ 
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }

    /**
     * Set the value of estado_civil
     *
     * @return  self
     */ 
    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of profissao
     */ 
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Set the value of profissao
     *
     * @return  self
     */ 
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    /**
     * Get the value of data_nasc
     */ 
    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    /**
     * Set the value of data_nasc
     *
     * @return  self
     */ 
    public function setData_nasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of deleted_at
     */ 
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of deleted_at
     *
     * @return  self
     */ 
    public function setDeleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    /**
     * Get the value of escolaridade
     */ 
    public function getEscolaridade()
    {
        return $this->escolaridade;
    }

    /**
     * Set the value of escolaridade
     *
     * @return  self
     */ 
    public function setEscolaridade($escolaridade)
    {
        $this->escolaridade = $escolaridade;

        return $this;
    }

    public function serialize(){
        return json_encode([ 
            'cliente'=>[
            'cliente_id'=>$this->id_cliente,
            'nome'=>$this->nome,
            'cpf'=>$this->cpf,
            'estado_civil'=>$this->escolaridade,
            'profissao'=>$this->profissao,
            'escolaridade'=>$this->escolaridade,
            'data_nasc'=>$this->data_nasc,
            'sexo'=>$this->sexo,
            'ativo'=>$this->ativo, 
            //pegando o primerio endereco
            'endereco'=> $this->lastEndereco() ? $this->lastEndereco() : null
            ]
        ]
        );
    }

    public function enderecos(){
        $endereco=new EnderecoDAO();
        return $endereco->clienteEnderecos($this->id_cliente);
    }

    public function processos(){
        $processo=new ProcessoDAO();
        return $processo->clienteProcessos($this->id_cliente);
    }

    public function lastEndereco(){
        $endereco=new EnderecoDAO();
        return $endereco->clienteEndereco($this->id_cliente);
    }

    public function lastProcesso(){
        $processo=new ProcessoDAO();
        return $processo->clienteProcesso($this->id_cliente);
    }

   
   /*  public function getProcessos(){

    }
    public function getProcessos(){
        
    } */


    /**
     * Get the value of id_cliente
     */ 
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of id_cliente
     *
     * @return  self
     */ 
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }
}
