<?php

namespace App\Models;

final class ResponsavelModel{

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

    /**
     * @var float
     */
    private $peso;

    /**
     * @var float
     */
    private $altura;

    /**
     * @var string
     */
    private $nacionalidade;

    /**
     * @var string
     */
    private $parentesco;

    public function getId():int{
        return $this->id;
    }

    public function setId(string $id):ResponsavelModel{
        $this->id =  $id;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):ResponsavelModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): ResponsavelModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): ResponsavelModel{
        $this->nome = $nome;
        return $this;
    }

    public function getNascimento(): string{
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento): ResponsavelModel{
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo): ResponsavelModel{
        $this->sexo = $sexo;
        return $this;
    }
    

    public function getPeso(): float{
        return $this->peso;
    }

    public function setPeso(float $peso): ResponsavelModel{
        $this->peso = $peso;
        return $this;
    }

    public function getAltura(): float{
        return $this->altura;
    }

    public function setAltura(float $altura): ResponsavelModel{
        $this->altura = $altura;
        return $this;
    }

    public function getNacionalidade(): string{
        return $this->nacionalidade;
    }

    public function setNacionalidade(string $nacionalidade): ResponsavelModel{
        $this->nacionalidade = $nacionalidade;
        return $this;
    }

    public function getParentesco(): string{
        return $this->parentesco;
    }

    public function setParentesco(string $parentesco): ResponsavelModel{
        $this->parentesco = $parentesco;
        return $this;
    }
}

