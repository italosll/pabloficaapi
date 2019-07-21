<?php

namespace App\Models;

final class ImcModel{

    /**
     * @var int
     */
    private $id;
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
    private $data;
    /**
     * @var int
     */
    private $idpaciente;


    public function getId(): int{
        return $this->id;
    }

    public function setId(string $id):ImcModel{
        $this->id =  $id;
        return $this;
    }

    public function getPeso(): float{
        return $this->peso;
    }

    public function setPeso(string $peso): ImcModel{
        $this->peso = $peso;
        return $this;
    }

    public function getAltura(): float{
        return $this->altura;
    }

    public function setAltura(float $altura): ImcModel{
         $this->altura = $altura;
         return $this;
    }

    public function getData(): string{
        return $this->data;
    }

    public function setData(string $data): ImcModel{
        $this->data = $data;
        return $this;
    }
    
    public function getIdpaciente(): int{
        return $this->idpaciente;
    }

    public function setIdpaciente(int $idpaciente): ImcModel{
        $this->idpaciente = $idpaciente;
        return $this;
    }
}