<?php

namespace app\model;

use app\core\Model;

require_once ('app/core/Model.php');

class Endereco extends Model {
    private $id_endereco, $endereco_id,$rua,$numero,$bairro,$cidade,$uf,$cep,$telefone_residencial,$telefone_celular,$complemento,$numero_casa,$created_at,$deleted_at, $cliente_id;

    public function is_valid(){
        return count($this->errors) === 0;
    }



    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }


    /**
     * Get the value of rua
     */ 
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     *
     * @return  self
     */ 
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */ 
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */ 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of telefone_residencial
     */ 
    public function getTelefone_residencial()
    {
        return $this->telefone_residencial;
    }

    /**
     * Set the value of telefone_residencial
     *
     * @return  self
     */ 
    public function setTelefone_residencial($telefone_residencial)
    {
        $this->telefone_residencial = $telefone_residencial;

        return $this;
    }

    /**
     * Get the value of telefone_celular
     */ 
    public function getTelefone_celular()
    {
        return $this->telefone_celular;
    }

    /**
     * Set the value of telefone_celular
     *
     * @return  self
     */ 
    public function setTelefone_celular($telefone_celular)
    {
        $this->telefone_celular = $telefone_celular;

        return $this;
    }

    /**
     * Get the value of complemento
     */ 
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */ 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of numero_casa
     */ 
    public function getNumero_casa()
    {
        return $this->numero_casa;
    }

    /**
     * Set the value of numero_casa
     *
     * @return  self
     */ 
    public function setNumero_casa($numero_casa)
    {
        $this->numero_casa = $numero_casa;

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

    public function serialize(){
        return json_encode([ 
            $this->toArray()
        ]);
    }
    public function toArray(){
        return [
            'endereco'=>[
                'rua'=>$this->getRua(),
                'numero'=>$this->getNumero(),
                'bairro'=>$this->getBairro(),
                'cidade'=>$this->getCidade(),
                'uf'=>$this->getUf(),
                'cep'=>$this->getCep(),
                'telefone_residencial'=>$this->getTelefone_residencial(),
                'telefone_celular'=>$this->getTelefone_celular(),
                'complemento'=>$this->getComplemento(),
                'numero'=>$this->getNumero()
            ]
        ];
    }

    /**
     * Get the value of endereco_id
     */ 
    public function getEndereco_id()
    {
        return $this->id_endereco;
    }

    /**
     * Set the value of endereco_id
     *
     * @return  self
     */ 
    public function setEndereco_id($endereco_id)
    {
        $this->id_endereco = $endereco_id;

        return $this;
    }

    /**
     * Get the value of id_endereco
     */ 
    public function getId_endereco()
    {
        return $this->id_endereco;
    }

    /**
     * Set the value of id_endereco
     *
     * @return  self
     */ 
    public function setId_endereco($id_endereco)
    {
        $this->id_endereco = $id_endereco;

        return $this;
    }

    /**
     * Get the value of cliente_id
     */ 
    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    /**
     * Set the value of cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }
}
