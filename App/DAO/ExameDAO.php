<?php

namespace App\DAO;

use App\Models\ExameModel;

class ExameDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function getAllExame():array{
        $exame = $this->pdo
            ->query('SELECT * FROM exame;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $exame;
    }


    public function insertExame(ExameModel $exame):void{
        $data = $this->pdo
        ->prepare(' INSERT INTO exame VALUES(
            null,
            :nome,
            :local,
            :data,
            :descricao,
            :idpaciente,
            null,
            null
            );');
        $data->execute([
            'nome' => $exame->getNome(),
            'local' => $exame->getLocal(),
            'data' => $exame->getData(),
            'descricao' => $exame->getDescricao(),
            'idpaciente' => $exame->getIdpaciente()
        ]);
    }

    public function updateExame(ExameModel $exame): void{

        $data = $this->pdo
            ->prepare('UPDATE exame SET 
            nome = :nome,
            local = :local,
            data = :data,
            descricao = :descricao,
            idpaciente = :idpaciente
            WHERE
            id = :id;');
        $data->execute([
            'id' => $exame->getId(),
            'nome' => $exame->getNome(),
            'local' => $exame->getLocal(),
            'data' => $exame->getData(),
            'descricao' => $exame->getDescricao(),
            'idpaciente' => $exame->getIdpaciente()
        ]);  
    }


    public function deleteExame(int $id):void{
        $data = $this->pdo
            ->prepare('DELETE FROM exame WHERE id = :id;');
        $data->execute([
            'id' => $id
        ]);
    }

}