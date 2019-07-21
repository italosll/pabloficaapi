<?php

namespace App\Middlewares;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response};
use App\Models\UsuarioModel;
use App\DAO\LoginDAO;
use App\Controllers\TokenController;
use App\DAO\TokenDAO;
use Firebase\JWT\JWT;

final class JwtDateTimeMiddleware{

    public function teste(Request $request, Response $response, callable $next):Response{

        $token = $request->getAttribute('jwt');
        $token_encoded = JWT::encode($token, getenv('JWT_SECRET_KEY'));
        $expireDate = new \DateTime($token['expired_at']);
        $active = $token['active'];
        $now = new \DateTime();
        $tokenDAO = new TokenDAO();
        $tokenExists = $tokenDAO->verificarToken($token_encoded);

        // O TOKEN ESTÁ NO BANCO DE DADOS? -> ESTÁ ATIVO NO BANCO?
        if(!$tokenExists) return $response->withStatus(401);
    
        // SE ACTIVE = 1 SEGUE O BAILE
        // DESSA FORMA TODA REQUISIÇÃO PODE RECEBER OU NÃO UM TOKEN E UM REFRESH TOKEN
        if(!$active) return $response->withStatus(401);// O TOKEN JA FOI USADO?


        // CRIAR UM NOVO TOKEN SE O ANTIGO ESTIVER EXPIRADO
        if($expireDate < $now){
            
            $email = $token['email'];
            $usuarioModel = new UsuarioModel();
            $usuarioDAO = new LoginDAO();
            $usuarioModel = $usuarioDAO->getUsuarioPorEmail($email); // PEGA USUARIO
            $tokenController = new TokenController();
            $reloaded_token = $tokenController->getTokenPorUsuario($usuarioModel); // PEGA TOKEN NOVO
        
            // DELETA TOKEN ANTIGO EXPIRADO
            $tokenDAO = new TokenDAO();
            $tokenDAO->deleteToken($token_encoded);
        } 
        
        $response = $next($request, $response);

        return $response
        ->withHeader('token' , $reloaded_token['token'])
        ->withHeader('refresh_token' , $reloaded_token['refresh_token']);

    }
}