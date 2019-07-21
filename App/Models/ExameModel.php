<?php

namespace App\Models;

final class ExameModel{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $local;
    /**
     * @var string
     */
    private $data;
    /**
     * @var string
     */
    private $descricao;
    /**
     * @var int
     */
    private $idpaciente;
    /**
     * @var int
     */
    private $idmedico;
    /**
     * @var int
     */
    private $idnutricionista;


    public function getId(): int{
        return $this->id;
    }

    public function setId(string $id):ExameModel{
        $this->id =  $id;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): ExameModel{
        $this->nome = $nome;
        return $this;
    }

    public function getLocal(): string{
        return $this->local;
    }

    public function setLocal(string $local): ExameModel{
        $this->local = $local;
        return $this;
    }

    public function getData(): string{
        return $this->data;
    }

    public function setData(string $data): ExameModel{
        $this->data = $data;
        return $this;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }

    public function setDescricao(string $descricao): ExameModel{
        $this->descricao = $descricao;
        return $this;
    }

    public function getIdpaciente(): int{
        return $this->idpaciente;
    }

    public function setIdpaciente(int $idpaciente): ExameModel{
        $this->idpaciente = $idpaciente;
        return $this;
    }

    public function getIdmedico(): int{
        return $this->idmedico;
    }

    public function setIdmedico(int $idmedico): ExameModel{
        $this->idmedico = $idmedico;
        return $this;
    }

    public function getIdnutricionista(): int{
        return $this->idnutricionista;
    }

    public function setIdnutricionista(int $idnutricionista): ExameModel{
        $this->idnutricionista = $idnutricionista;
        return $this;
    }
}














