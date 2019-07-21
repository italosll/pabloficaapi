<?php

namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\DAO\ExameDAO;
use App\Models\ExameModel;

final class ExameController{

    public function getAllexame(Request $request, Response $response, array $args): Response {
        $exameDAO = new ExameDAO();
        $exame = $exameDAO->getAllexame();
        $response = $response->withJson($exame);
        return $response;
    }

    public function insertExame(Request $request, Response $response, array $args): Response {

        $data = $request->getParsedBody();
        $exameDAO = new ExameDAO();
        $exame = new ExameModel();
        $exame->setNome($data['nome'])
        ->setLocal($data['local'])
        ->setData($data['data'])
        ->setDescricao($data['descricao'])
        ->setIdpaciente($data['idpaciente']);
        $exameDAO->insertExame($exame);

        $response = $response->withJson([
            'message' => "Inserido com sucesso"

        ]);

        return $response;
    }

    public function updateExame(Request $request, Response $response, array $args): Response {

        $data = $request->getParsedBody();
        $exameDAO = new ExameDAO();
        $exame = new ExameModel();
        $exame->setNome($data['nome'])
        ->setLocal($data['local'])
        ->setData($data['data'])
        ->setDescricao($data['descricao'])
        ->setIdpaciente($data['idpaciente'])
        ->setId($data['id']);
        $exameDAO->updateExame($exame);

        $response = $response->withJson([
            'message' =>'Alterado com sucesso'
        ]);

        return $response;
    }

    public function deleteExame(Request $request, Response $response, array $args): Response {
        
        $data = $request->getParsedBody();
        $exameDAO = new ExameDAO();
        $id = (int)$data['id'];
        $exameDAO->deleteExame($id);
        $response = $response->withJson([
            'message' =>"Deletado com sucesso"
        ]);

        return $response;
    }










}