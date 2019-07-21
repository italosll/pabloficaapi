<?php

namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\DAO\ImcDAO;
use App\Models\ImcModel;

final class ImcController{


    public function getAllImc(Request $request, Response $response, array $args): Response {
        $imcDAO = new ImcDAO();
        $imc = $imcDAO->getAllImc();
        $response = $response->withJson($imc);
        return $response;
    }

    public function insertImc(Request $request, Response $response, array $args): Response {

        $data = $request->getParsedBody();
        $imcDAO = new ImcDAO();
        $imc = new ImcModel();
        $imc->setPeso($data['peso'])
        ->setAltura($data['altura'])
        ->setData($data['data'])
        ->setIdpaciente($data['idpaciente']);
        $imcDAO->insertImc($imc);
        $response = $response->withJson([
            'message' =>'Inserido com Sucesso'
        ]);
        return $response;
    }

    public function updateImc(Request $request, Response $response, array $args): Response {


        $data = $request->getParsedBody();
        $imcDAO = new ImcDAO();
        $imc = new ImcModel();
        $imc->setPeso($data['peso'])
        ->setAltura($data['altura'])
        ->setData($data['data'])
        ->setIdpaciente($data['idpaciente'])
        ->setId($data['id']);
        $imcDAO->updateImc($imc);
        
        $response = $response->withJson([
            'message' =>'Alterado com Sucesso'
        ]);

        return $response;
    }

    public function deleteImc(Request $request, Response $response, array $args): Response {
        
        $data = $request->getParsedBody();
        $imcDAO = new ImcDAO();
        $id = (int)$data['id'];
        $imcDAO->deleteImc($id);
        $response = $response->withJson([
            'message' =>'Deletado com Sucesso'
        ]);

        return $response;
    }










}