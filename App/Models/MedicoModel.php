<?php

namespace App\Models;

final class MedicoModel{

        //id	email	senha	nome	crm	especialidade	nascimento	sexo


    /**
     * @var int 
    */
    private $id;

    /**
     * @var string
    */
    private $email;

    /**
     * @var string
    */
    private $senha;

    /**
     * @var string
    */
    private $nome;

    /**
     * @var string
    */
    private $crm;

    /**
     * @var string
    */
    private $especialidade;

    /**
     * @var string 
    */
    private $nascimento;

    /**
     * @var string
    */
    private $sexo;


    public function getId():int{
        return $this->id;
    }

    public function setId(string $id):MedicoModel{
        $this->id =  $id;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):MedicoModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): MedicoModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): MedicoModel{
        $this->nome = $nome;
        return $this;
    }

    public function getCrm(): string{
        return $this->crm;
    }

    public function setCrm(string $crm): MedicoModel{
        $this->crm = $crm;
        return $this;
    }

    public function getEspecialidade(): string{
        return $this->especialidade;
    }

    public function setEspecialidade(string $especialidade): MedicoModel{
        $this->crm = $especialidade;
        return $this;
    }

    public function getNascimento(): string{
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento): MedicoModel{
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo): MedicoModel{
        $this->sexo = $sexo;
        return $this;
    }
    
}

