<?php


namespace App\Models;

final class PacienteModel{
 
    /**
     * @var int
     */
    private $id;

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
    private $email;

    /**
     * @var string
     */
    private $nascimento;

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
    private $sexo;
    
    /**
     * @var string
     */
    private $nacionalidade;



    public function getId():int{
        return $this->id;
    }

    public function setId(string $id):PacienteModel{
        $this->id =  $id;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):PacienteModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): PacienteModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): PacienteModel{
        $this->nome = $nome;
        return $this;
    }

    public function getNascimento(): string{
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento): PacienteModel{
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getPeso(): float{
        return $this->peso;
    }

    public function setPeso(float $peso): PacienteModel{
        $this->peso = $peso;
        return $this;
    }

    public function getAltura(): float{
        return $this->altura;
    }

    public function setAltura(float $altura): PacienteModel{
        $this->altura = $altura;
        return $this;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo): PacienteModel{
        $this->sexo = $sexo;
        return $this;
    }

    public function getNacionalidade(): string{
        return $this->nacionalidade;
    }

    public function setNacionalidade(string $nacionalidade): PacienteModel{
        $this->nacionalidade = $nacionalidade;
        return $this;
    }
}














