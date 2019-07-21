<?php
namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\DAO\PacienteDAO;
use App\Models\PacienteModel;

final class PacienteController{


    public function getAllPaciente(Request $request, Response $response, array $args): Response {
        $pacienteDAO = new PacienteDAO();
        $paciente = $pacienteDAO->getAllPaciente();
        $response = $response->withJson($paciente);
        return $response;
    }

    public function insertPaciente(Request $request, Response $response, array $args): Response {

        $data = $request->getParsedBody();
        $pacienteDAO = new PacienteDAO();
        $paciente = new PacienteModel();
        $paciente->setSenha($data['senha'])
            ->setNome($data['nome'])
            ->setNascimento($data['nascimento'])
            ->setPeso($data['peso'])
            ->setAltura($data['altura'])
            ->setSexo($data['sexo'])
            ->setNacionalidade($data['nacionalidade'])
            ->setEmail($data['email']);
        $pacienteDAO->insertPaciente($paciente);

        $response = $response->withJson([
            'message' =>'Inserido com Sucesso'
        ]);
        return $response;
    }

    public function updatePaciente(Request $request, Response $response, array $args): Response {
        
        $data = $request->getParsedBody();
        $pacienteDAO = new PacienteDAO();
        $paciente = new PacienteModel();
        $paciente->setSenha($data['senha'])
            ->setEmail($data['email'])
            ->setNome($data['nome'])
            ->setNascimento($data['nascimento'])
            ->setPeso($data['peso'])
            ->setAltura($data['altura'])
            ->setSexo($data['sexo'])
            ->setNacionalidade($data['nacionalidade'])
            ->setId($data['id']);
        $pacienteDAO->updatePaciente($paciente);
        
        $response = $response->withJson([
            'message' =>'Atualizado com sucesso'
        ]);
        return $response;
    }

    public function deletePaciente(Request $request, Response $response, array $args): Response {
        
        $pacienteDAO = new PacienteDAO();
        $data = $request->getParsedBody();
        $id = (int)$data['id'];
        $pacienteDAO->deletePaciente($id);
        $response = $response->withJson([
            'message' =>'Deletado com sucesso'
        ]);
        return $response;
    }
}