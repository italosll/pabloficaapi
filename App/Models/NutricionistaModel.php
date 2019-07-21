<?php

namespace App\Models;

final class NutricionistaModel{


        //id	email	senha	nome	crn	nascimento	sexo

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
    private $crn;

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

    public function setId(string $id):NutricionistaModel{
        $this->id =  $id;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):NutricionistaModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): NutricionistaModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): NutricionistaModel{
        $this->nome = $nome;
        return $this;
    }

    public function getCrn(): string{
        return $this->crn;
    }

    public function setCrn(string $crn): NutricionistaModel{
        $this->crn = $crn;
        return $this;
    }

    public function getNascimento(): string{
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento): NutricionistaModel{
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo): NutricionistaModel{
        $this->sexo = $sexo;
        return $this;
    }
    
}

