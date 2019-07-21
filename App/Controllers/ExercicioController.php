<?php

namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\DAO\ExercicioDAO;
use App\Models\ExercicioModel;

final class ExercicioController{
    public function getAllExercicio(Request $request, Response $response, array $args): Response {
        $exercicioDAO = new ExercicioDAO();
        $exercicio = $exercicioDAO->getAllExercicio();
        $response = $response->withJson($exercicio);
        return $response;
    }

    public function insertExercicio(Request $request, Response $response, array $args): Response {  
        $data = $request->getParsedBody();
        $exercicioDAO = new ExercicioDAO();
        $exercicio = new ExercicioModel();
        $exercicio->setNome($data['nome'])
         ->setDescricao($data['descricao'])
         ->setIdpaciente($data['idpaciente']);
        $exercicioDAO->insertExercicio($exercicio);
        $response = $response->withJson([
            'message' =>'Inserido com Sucesso'
        ]);
        return $response;
    }


    public function updateExercicio(Request $request, Response $response, array $args): Response {
        
        $data = $request->getParsedBody();
        $exercicioDAO = new ExercicioDAO();
        $exercicio = new ExercicioModel();

        $exercicio->setNome($data['nome'])
            ->setDescricao($data['descricao'])
            ->setIdpaciente($data['idpaciente'])
            ->setId($data['id']);
        $exercicioDAO->updateExercicio($exercicio);
        
        $response = $response->withJson([
            'message' =>'Alterado com Sucesso'
        ]);
        return $response;
    }

    public function deleteExercicio(Request $request, Response $response, array $args): Response {
        
        $data = $request->getParsedBody();
        $exercicioDAO = new ExercicioDAO();
        $id = (int)$data['id'];
        $exercicioDAO->deleteExercicio($id);
        $response = $response->withJson([
            'message' =>'Deletado com Sucesso'
        ]);

        return $response;
    }










}