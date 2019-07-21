<?php


namespace App\Models;

final class UsuarioModel{


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

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
    private $senha;


    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id):UsuarioModel{
        $this->id =  $id;
        return $this;
    }

    public function getTipo():string{
        return $this->tipo;
    }

    public function setTipo(string $tipo):UsuarioModel{
        $this->tipo =  $tipo;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):UsuarioModel{
        $this->email =  $email;
        return $this;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    public function setSenha(string $senha): UsuarioModel{
        $this->senha = $senha;
        return $this;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome(string $nome): UsuarioModel{
        $this->nome = $nome;
        return $this;
    }



}