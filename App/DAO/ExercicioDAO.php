<?php

namespace App\DAO;

use App\Models\ExercicioModel;

class ExercicioDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function getAllExercicio():array{
        $data = $this->pdo
        ->query('SELECT id,nome,descricao,idpaciente  FROM exercicio')
        ->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
    }

    public function insertExercicio(ExercicioModel $exercicio):void{
        $data = $this->pdo
        ->prepare(' INSERT INTO exercicio VALUES(
            null,
            :nome,
            :descricao,
            :idpaciente,
            null
            );');
        $data->execute([
            'nome' => $exercicio->getNome(),
            'descricao' => $exercicio->getDescricao(),
            'idpaciente' => $exercicio->getIdpaciente()
        ]);
    }

    public function updateExercicio(ExercicioModel $exercicio):void{

        $data = $this->pdo
            ->prepare('UPDATE exercicio SET 
            nome = :nome,
            descricao = :descricao,
            idpaciente = :idpaciente
            WHERE
            id = :id;');
        $data->execute([
            'id' => $exercicio->getId(),
            'nome' => $exercicio->getNome(),
            'descricao' => $exercicio->getDescricao(),
            'idpaciente' => $exercicio->getIdpaciente()
        ]);  
    }

    public function deleteExercicio(int $id):void{
        $data = $this->pdo
            ->prepare('DELETE FROM exercicio WHERE id = :id;');
        $data->execute([
            'id' => $id
        ]);
    }


}