<?php

namespace app\model;

use app\core\Model;

require_once('app/core/Model.php');

class Processo extends Model
{
    private $id_processo, $processo, $situacao_id, $tipo_processo_id, $observacao, $created_at, $deleted_at, $date, $cliente_id;

    private $tipos_processos = [
        9 => 'Alt. Local ou Forma Pgto',
        2 => 'Apos. Idade Rural',
        3 => 'Apos. Idade Urbana',
        1 => 'Apos. Pessoa com Def. Por Idade',
        4 => 'Apos. Tempo Cont',
        7 => 'Apresentar Defesa - MOB',
        8 => 'Apuração Bat. Contínuo / MDS',
        18 => 'Aux. Reclusão',
        19 => 'Aux. Reclusão',
        17 => 'Benefício Assist. ao Idoso',
        10 => 'Cadastrar ou Renovar Procuração',
        5 => 'Cancelar CTC',
        21 => 'Cópia de Processo',
        6 => 'CTC',
        15 => 'Pedido de Prorrog. com Doc. Médico',
        20 => 'Pensão',
        11 => 'Reativar Benefício',
        22 => 'Recurso',
        23 => 'Revisão',
        24 => 'Revisão de CTC',
        16 => 'Solicitação de Acréscimo de 25 %',
        12 => 'Solicitar Cert. Inexistência Dep. Habil. Pensão',
        13 => 'Solicitar Desistência do Benefício',
        14 => 'Solicitar Pgto de Benefício Não Recebido'
    ];

    private $situacao_processo = [
        3 => 'ANÁLISE',
        7 => 'ANDAMENTO',
        5 => 'CANCELADA',
        1 => 'CONCEDIDO',
        9 => 'CONCLUÍDO',
        6 => 'CUMPRIDO',
        8 => 'EXIGÊNCIA INTERNA',
        2 => 'EXIGÊNGIA',
        4 => 'INDEFIRIDO'
    ];

    private $processo_nome = [
        1=>'Administrativo',
        3=>'Arquivo',
        2=>'Jurídico'
    ];
    public function is_valid()
    {
        $this->isNotNull("processo", $this->getProcesso());
        $this->isNotBlank("processo", $this->getProcesso());
        return count($this->errors) === 0;
    }

    public function getProcesso()
    {
        return $this->processo;
    }

    public function getNameTipoProcesso()
    {
        return $this->tipos_processos[$this->tipo_processo_id];
    }

    public function getNameProcesso()
    {
        return $this->processo_nome[$this->processo];
    }

    public function getNameSituacaoProcesso()
    {
        return $this->situacao_processo[$this->situacao_id];
    }

    public function setProcesso($processo)
    {
        $this->processo = $processo;
    }


    /**
     * Get the value of situacao_id
     */
    public function getSituacao_id()
    {
        return $this->situacao_id;
    }

    /**
     * Set the value of situacao_id
     *
     * @return  self
     */
    public function setSituacao_id($situacao_id)
    {
        $this->situacao_id = $situacao_id;

        return $this;
    }

    /**
     * Get the value of tipo_processo_id
     */
    public function getTipo_processo_id()
    {
        return $this->tipo_processo_id;
    }

    /**
     * Set the value of tipo_processo_id
     *
     * @return  self
     */
    public function setTipo_processo_id($tipo_processo_id)
    {
        $this->tipo_processo_id = $tipo_processo_id;

        return $this;
    }

    /**
     * Get the value of observacao
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

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
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function serialize()
    {
        return json_encode(
            [
                'processo' => [
                    'id_processo' => $this->getId_processo(),
                    'processo' => intval($this->getProcesso()),
                    'tipo_processo_id' => intval($this->getTipo_processo_id()),
                    'observacao' => $this->getObservacao(),
                    'date' => $this->getDate(),
                    'situacao_id' => intval($this->getSituacao_id()),
                ]
            ]
        );
    }

    /**
     * Get the value of processo_id
     */
    public function getProcesso_id()
    {
        return $this->id_processo;
    }

    /**
     * Set the value of processo_id
     *
     * @return  self
     */
    public function setProcesso_id($processo_id)
    {
        $this->id_processo = $processo_id;

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

    /**
     * Get the value of id_processo
     */
    public function getId_processo()
    {
        return $this->id_processo;
    }

    /**
     * Set the value of id_processo
     *
     * @return  self
     */
    public function setId_processo($id_processo)
    {
        $this->id_processo = $id_processo;

        return $this;
    }
}
