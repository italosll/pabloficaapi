<?php

namespace App\Models;

final class ExercicioModel{

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
    private $descricao;
    /**
     * @var int
     */
    private $idpaciente;
    /**
     * @var int
     */
    private $idpersonal;


    public function getId(): int{
        return $this->id;
    }

    public function setId(string $id):ExercicioModel{
        $this->id =  $id;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): ExercicioModel{
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }

    public function setDescricao(string $descricao): ExercicioModel{
        $this->descricao = $descricao;
        return $this;
    }

    public function getIdpaciente(): int{
        return $this->idpaciente;
        return $this;
    }

    public function setIdpaciente(int $idpaciente): ExercicioModel{
        $this->idpaciente = $idpaciente;
        return $this;
    }

    public function getIdpersonal(): int{
        return $this->idpersonal;
    }

    public function setIdpersonal(int $idpersonal): ExercicioModel{
        $this->idpersonal = $idpersonal;
        return $this;
    }

}