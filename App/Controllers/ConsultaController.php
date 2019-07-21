<?php

namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\Models\ConsultaModel;
use App\DAO\ConsultaDAO;

final class ConsultaController{

    public function getAllConsulta(Request $request, Response $response, array $args):Response{
        $consultaDAO = new ConsultaDAO();
        $consulta = $consultaDAO->getAllConsulta();
        $response = $response->withJson($consulta);
        return $response;
    }


    public function insertConsulta(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $consultaDAO = new ConsultaDAO();
        $consulta = new ConsultaModel();
        $consulta->setData($data['data'])
            ->setLocal($data['local'])
            ->setIdpaciente($data['idpaciente']);
        $consultaDAO->insertConsulta($consulta);

        return $response->withJson([
            'message' =>'Inserido com Sucesso'
        ]);

        
    }

    public function updateConsulta(Request $request, Response $response, array $args){

        $data = $request->getParsedBody();
        $consultaDAO = new ConsultaDAO();
        $consulta = new ConsultaModel();
        $consulta->setLocal($data['local'])
        ->setData($data['data'])
        ->setIdpaciente($data['idpaciente'])
        ->setId($data['id']);
        $consultaDAO->updateConsulta($consulta);

        $response = $response->withJson([
            'message' => "Alterado com sucesso"
        ]);
        return $response;
    }

    public function deleteConsulta(Request $request, Response $response, array $args){

        $consultaDAO = new ConsultaDAO();
        $data = $request->getParsedBody();
        $id = (int)$data['id'];
        $consultaDAO->deleteConsulta($id);

        $response = $response->withJson([
            'message' => "Deletado com sucesso"

        ]);
        return $response;  
    }




}