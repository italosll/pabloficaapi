<?php

namespace App\Models;

final class PersonalModel{

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
    private $nascimento;

    /**
     * @var string
    */
    private $sexo;


    public function getId():int{
        return $this->id;
    }

    public function setId(string $id):PersonalModel{
        $this->id =  $id;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):PersonalModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): PersonalModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): PersonalModel{
        $this->nome = $nome;
        return $this;
    }

    public function getNascimento(): string{
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento): PersonalModel{
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo): PersonalModel{
        $this->sexo = $sexo;
        return $this;
    }
    
}

