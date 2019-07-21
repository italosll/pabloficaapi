<?php

namespace App\DAO;

use App\Models\ImcModel;

class ImcDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function getAllImc():array{
        $imc = $this->pdo
            ->query('SELECT * FROM imc;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $imc; 
    }

    public function updateImc(ImcModel $imc): void{

        $data = $this->pdo
            ->prepare('UPDATE imc SET 
            peso = :peso,
            altura = :altura,
            data = :data,
            idpaciente = :idpaciente
            WHERE
            id = :id;');
        $data->execute([
            'id' => $imc->getId(),
            'peso' => $imc->getPeso(),
            'altura' => $imc->getAltura(),
            'data' => $imc->getData(),
            'idpaciente' => $imc->getIdpaciente()
        ]);  
    }

    public function insertImc(ImcModel $imc):void{
        $data = $this->pdo
        ->prepare('INSERT INTO imc VALUES(
            null,
            :peso,
            :altura,
            :data,
            :idpaciente
            );');
        $data->execute([
            'peso' => $imc->getPeso(),
            'altura' =>  $imc->getAltura(),
            'data' =>  $imc->getData(),
            'idpaciente' =>  $imc->getIdpaciente()
        ]);
    }

    public function deleteImc(int $id):void{
        $data = $this->pdo
            ->prepare('DELETE FROM imc WHERE id = :id;');
        $data->execute([
            'id' => $id
        ]);
    }


}