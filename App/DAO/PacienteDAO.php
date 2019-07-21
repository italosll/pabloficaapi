<?php

namespace App\DAO;

use App\Models\PacienteModel;

class PacienteDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function getAllPaciente():array{
        $paciente = $this->pdo
        ->query('SELECT * FROM paciente;')
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $paciente;

    }

    public function insertPaciente(PacienteModel $paciente):void{

            $data = $this->pdo
            ->prepare('INSERT INTO paciente VALUES(
            null,
            :email,
            :senha,
            :nome,
            :nascimento,
            :peso,
            :altura,
            :sexo,
            :nacionalidade
            );');
        $data->execute([
            'email' => $paciente->getEmail(),
            'senha' => $paciente->getSenha(),
            'nome' => $paciente->getNome(),
            'nascimento' => $paciente->getNascimento(),
            'peso' => $paciente->getPeso(),
            'altura' => $paciente->getAltura(),
            'sexo' => $paciente->getSexo(),
            'nacionalidade' => $paciente->getNacionalidade()
        ]);

    }

    public function updatePaciente(PacienteModel $paciente){
        
        $data = $this->pdo
            ->prepare('UPDATE paciente SET 
            email = :email,
            senha = :senha,
            nome = :nome,
            nascimento = :nascimento,
            peso = :peso,
            altura = :altura,
            sexo = :sexo,
            nacionalidade = :nacionalidade
            WHERE id = :id;');
        $data->execute([
            'id' => $paciente->getId(),
            'email' => $paciente->getEmail(),
            'senha' => $paciente->getSenha(),
            'nome' => $paciente->getNome(),
            'nascimento' => $paciente->getNascimento(),
            'peso' => $paciente->getPeso(),
            'altura' => $paciente->getAltura(),
            'sexo' => $paciente->getSexo(),
            'nacionalidade' => $paciente->getNacionalidade()
        ]);

    }

    public function deletePaciente(int $id): void{

        $data = $this->pdo
            ->prepare('DELETE FROM paciente WHERE id = :id;');
        $data->execute([
            'id' => $id
        ]);
    }

}