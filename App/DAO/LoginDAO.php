<?php

namespace App\DAO;

use App\Models\{
    PacienteModel,
    PersonalModel,
    MedicoModel,
    NutricionistaModel,
    ResponsavelModel,
    UsuarioModel};

class LoginDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function getPacientePorEmail(string $email):?PacienteModel{

        $data = $this->pdo
            ->prepare('SELECT 
                        id,
                        email,
                        senha,
                        nome,
                        nascimento,
                        peso,
                        altura,
                        sexo,
                        nacionalidade
                        FROM paciente
                        WHERE email = :email
                        ');
        $data->bindParam('email', $email);
        $data->execute();
        $paciente = $data->fetchAll(\PDO::FETCH_ASSOC);
        
        if(count($paciente)===0){
            return null;
        }

        $pacienteModel = new PacienteModel();
        $pacienteModel->setId($paciente[0]['id'])
                        ->setEmail($paciente[0]['email'])
                        ->setSenha($paciente[0]['senha'])
                        ->setNome($paciente[0]['nome'])
                        ->setNascimento($paciente[0]['nascimento'])
                        ->setPeso($paciente[0]['peso'])
                        ->setAltura($paciente[0]['altura'])
                        ->setSexo($paciente[0]['sexo'])
                        ->setNacionalidade($paciente[0]['nacionalidade']);
        return $pacienteModel;
    }

    public function getPersonalPorEmail(string $email):?PersonalModel{

        $data = $this->pdo
            ->prepare('SELECT 
                        id,
                        email,
                        senha,
                        nome,
                        nascimento,
                        sexo                
                        FROM personal
                        WHERE email = :email
                        ');
        $data->bindParam('email',$email);
        $data->execute();
        $personal = $data->fetchAll(\PDO::FETCH_ASSOC);

        if(count($personal)===0){
            return null;
        }

        $personalModel = new PersonalModel();
        $personalModel->setId($personal[0]['id'])
                        ->setEmail($personal[0]['email'])
                        ->setSenha($personal[0]['senha'])
                        ->setNome($personal[0]['nome'])
                        ->setNascimento($personal[0]['nascimento'])
                        ->setSexo($personal[0]['sexo']);
        
        return $personalModel;

    }

    public function getMedicoPorEmail(string $email):?MedicoModel{

        $data = $this->pdo
            ->prepare('SELECT 
                        id,
                        email,
                        senha,
                        nome,
                        crm,
                        especialidade,
                        nascimento,
                        sexo
                        FROM medico 
                        WHERE email = :email
                        ');
        $data->bindParam('email',$email);
        $data->execute();
        $medico = $data->fetchAll(\PDO::FETCH_ASSOC);

        if(count($medico)===0){
            return null;
        }

        $medicoModel = new MedicoModel();
        $medicoModel->setId($medico[0]['id'])
                        ->setEmail($medico[0]['email'])
                        ->setSenha($medico[0]['senha'])
                        ->setNome($medico[0]['nome'])
                        ->setCrm($medico[0]['crm'])
                        ->setEspecialidade($medico[0]['nascimento'])
                        ->setNascimento($medico[0]['nascimento'])
                        ->setSexo($medico[0]['sexo']);
        
        return $medicoModel;
    }

    public function getNutricionistaPorEmail(string $email):?NutricionistaModel{

        $data = $this->pdo
                ->prepare('SELECT 
                            id,
                            email,
                            senha,
                            nome,
                            crn,
                            nascimento,
                            sexo
                            FROM nutricionista
                            WHERE email = :email
                        ');
        $data->bindParam('email',$email);
        $data->execute();
        $nutricionista = $data->fetchAll(\PDO::FETCH_ASSOC);

        if(count($nutricionista)===0){
            return null;
        }

        $nutricionistaModel = new NutricionistaModel();
        $nutricionistaModel->setId($nutricionista[0]['id'])
                            ->setEmail($nutricionista[0]['email'])
                            ->setSenha($nutricionista[0]['senha'])
                            ->setNome($nutricionista[0]['nome'])
                            ->setCrn($nutricionista[0]['crn'])
                            ->setNascimento($nutricionista[0]['nascimento'])
                            ->setSexo($nutricionista[0]['sexo']);

        return $nutricionistaModel;

    }

    public function getReponsavelPorEmail(string $email):?ResponsavelModel{
    
        $data = $this->pdo
            ->prepare('SELECT
                        id,
                        email,
                        senha,
                        nome,
                        nascimento,
                        sexo,
                        peso,
                        altura,
                        nacionalidade,
                        parentesco
                        FROM responsavel
                        WHERE email = :email
                        ');
        $data->bindParam('email', $email);
        $data->execute();
        $responsavel = $data->fetchAll(\PDO::FETCH_ASSOC);
        
        if(count($responsavel)===0){
            return null;
        }

        $responsavelModel = new ResponsavelModel();
        $responsavelModel->setId($responsavel[0]['id'])
                            ->setEmail($responsavel[0]['email'])
                            ->setSenha($responsavel[0]['senha'])
                            ->setNome($responsavel[0]['nome'])
                            ->setNascimento($responsavel[0]['nascimento'])
                            ->setSexo($responsavel[0]['sexo'])
                            ->setPeso($responsavel[0]['peso'])
                            ->setAltura($responsavel[0]['altura'])
                            ->setNacionalidade($responsavel[0]['nacionalidade'])
                            ->setParentesco($responsavel[0]['parentesco']);

        return $responsavelModel;

    }

    public function getUsuarioPorEmail(string $email):?UsuarioModel{
        $loginDAO = new LoginDAO();
        $paciente = $loginDAO->getPacientePorEmail($email);
        $personal = $loginDAO->getPersonalPorEmail($email);
        $medico = $loginDAO->getMedicoPorEmail($email);
        $nutricionista = $loginDAO->getNutricionistaPorEmail($email);
        $responsavel = $loginDAO->getReponsavelPorEmail($email);
        $usuario = new UsuarioModel();

        if(!is_null($paciente)){
            $usuario->setId($paciente->getId())
                    ->setNome($paciente->getNome())
                    ->setEmail($paciente->getEmail())
                    ->setTipo('paciente')
                    ->setSenha($paciente->getSenha());  
        }

        if(!is_null($personal)){
            $usuario->setId($personal->getId())
                    ->setNome($personal->getNome())
                    ->setEmail($personal->getEmail())
                    ->setTipo('personal')
                    ->setSenha($personal->getSenha());
        }

        if(!is_null($medico)){
            $usuario->setId($medico->getId())
                    ->setNome($medico->getNome())
                    ->setEmail($medico->getEmail())
                    ->setTipo('medico')
                    ->setSenha($medico->getSenha());
        }

        if(!is_null($nutricionista)){
            $usuario->setId($nutricionista->getId())
                    ->setNome($nutricionista->getNome())
                    ->setEmail($nutricionista->getEmail())
                    ->setTipo('nutricionista')
                    ->setSenha($nutricionista->getSenha());
        }

        if(!is_null($responsavel)){
            $usuario->setId($responsavel->getId())
                    ->setNome($responsavel->getNome())
                    ->setEmail($responsavel->getEmail())
                    ->setTipo('responsavel')
                    ->setSenha($responsavel->getSenha());
        }

        if(is_null($usuario->getId())){
            return null;
        }

        return $usuario;
    }
}