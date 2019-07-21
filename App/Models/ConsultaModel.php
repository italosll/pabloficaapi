<?php

namespace App\Models;


final class ConsultaModel{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $local;
    
    /**
     * @var string
     */
    private $data;
    
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


    public function getId():int{
        return $this->id;
    }

    public function setId(string $id):ConsultaModel{
        $this->id =  $id;
        return $this;
    }

    public function getLocal():string{
        return $this->local;
    }

    public function setLocal(string $local):ConsultaModel{
        $this->local = $local;
        return $this;
    }

    public function getData():string{
        return $this->data;
    }

    public function setData(string $data):ConsultaModel{
        $this->data = $data;
        return $this;
    }

    public function getIdpaciente():int{
        return $this->idpaciente;
    }

    public function setIdpaciente(int $idpaciente):ConsultaModel{
        $this->idpaciente = $idpaciente;
        return $this;
    }

    public function getIdmedico():int{
        return $this->idmedico;
    }

    public function setIdmedico(int $idmedico):ConsultaModel{
        $this->idmedico = $idmedico;
        return $this;
    }

    public function getIdnutricionista():int{
        return $this->idnutricionista;
    }

    public function setIdnutricionista(int $idnutricionista):ConsultaModel{
        $this->idnutricionista = $idnutricionista;
        return $this;
    }
}