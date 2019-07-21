<?php

namespace App\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\DAO\{
    LoginDAO,
    TokenDAO};
use Firebase\JWT\JWT;

final class AutenticacaoController{

    public function login(Request $request, Response $response, array $args):Response{

        $data = $request->getParsedBody();
        $email = $data['email'];
        $senha = $data['senha'];
        $usuarioDAO = new LoginDAO();
        $usuario = $usuarioDAO->getUsuarioPorEmail($email);
        // VALIDA NÃO TER USUARIO
        if(is_null($usuario)) return $response->withStatus(401);
        // VALIDA SENHA
        if($senha != $usuario->getSenha()) return $response->withStatus(401);
        // getTokenPorUsuario
        $tokenController = new TokenController();
        $token_refresh_token = $tokenController->getTokenPorUsuario($usuario);
        // RETORNA TOKEN E REFRESH_TOKEN
        $response = $response->withJson([
            "token" => $token_refresh_token['token'] ,
            "refresh_token" =>$token_refresh_token['refresh_token']
        ]);
        return $response;
    }

    public function refreshToken(Request $request, Response $response, array $args):Response{
    
        $data = $request->getParsedBody();
        $refreshToken = $data['refresh_token'];
        // esse refresh_token é firmeza msm?
        $tokenDAO = new TokenDAO();
        $refreshTokenExists = $tokenDAO->verificarRefreshToken($refreshToken);
        if(!$refreshTokenExists) return $response->withStatus(403);
        // decodificando o token, pegando o email
        $jwt = $refreshToken;
        $key = getenv("JWT_SECRET_KEY");
        $decoded = (array)JWT::decode($jwt, $key, array('HS256'));
        $email = $decoded['email'];
        // Recuperando usuario através do email
        $usuarioDAO = new LoginDAO(); 
        $usuario = $usuarioDAO->getUsuarioPorEmail($email);
        if(is_null($usuario)) return $response->withStatus(404);

        // DESATIVANDO TOKEN ANTIGO
        $tokenDAO->ableDisableRefresToken($refreshToken,0);

        // getTokenPorUsuario
        $tokenController = new TokenController();
        $token_refresh_token = $tokenController->getTokenPorUsuario($usuario);
        
        // RETORNA TOKEN E REFRESH_TOKEN
        $response = $response->withJson([
            "token" => $token_refresh_token['token'] ,
            "refresh_token" =>$token_refresh_token['refresh_token']
        ]);

        return $response;   
     
    }
}
