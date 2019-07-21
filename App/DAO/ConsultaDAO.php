<?php

namespace App\DAO;

use App\Models\ConsultaModel;

class ConsultaDAO extends Conexao{

    public function construct(){

        parent::__construct();

    }

    public function getAllConsulta():array{
        $consulta = $this->pdo
            ->query('SELECT * FROM consulta;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $consulta;
    }

    public function insertConsulta(ConsultaModel $consulta):void{



        $data = $this->pdo
            ->prepare('INSERT INTO consulta VALUES(
                null,
                :local,
                :data,
                :idpaciente,
                null,
                null
                );');
        $data->execute([
            'local' => $consulta->getLocal(),
            'data' => $consulta->getData(),
            'idpaciente' => $consulta->getIdpaciente()
        ]);

    }

    public function updateConsulta(ConsultaModel $consulta):void{

        $data = $this->pdo
            ->prepare('UPDATE consulta SET 
            local = :local,
            data = :data,
            idpaciente = :idpaciente
            WHERE id = :id;');
        $data->execute([
            'id' => $consulta->getId(),
            'local' => $consulta->getLocal(),
            'data' => $consulta->getData(),
            'idpaciente' => $consulta->getIdpaciente()
        ]);

    }


    public function deleteConsulta(int $id):void{
        $data = $this->pdo
            ->prepare('DELETE FROM consulta WHERE id = :id;');
        $data->execute([
            'id' => $id
        ]);
    }

}