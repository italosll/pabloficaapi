<?php
namespace App\Controllers;


use App\Models\{
    TokenModel,
    UsuarioModel};
use Firebase\JWT\JWT;
use App\DAO\TokenDAO;

final class TokenController{


public function getTokenPorUsuario(UsuarioModel $usuario):?array{
    
        $expired_at = (new \DateTime())->modify('+2 days')
        ->format('Y-m-d H:i:s');

        $now = new \DateTime();

        $tokenPayload = [
            'id' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'active' => '1',
            'expired_at' => $expired_at
        ];
        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            'date' => $now
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel;
        $tokenModel->setExpired_at($expired_at)
        ->setRefreshToken($refreshToken)
        ->setToken($token)
        ->setUsuario_id($usuario->getId());

        $tokenDAO = new TokenDAO();
        $tokenDAO->createToken($tokenModel);
        $response =([
            "token" => $token,
            "refresh_token" =>$refreshToken
        ]);

        return $response;
    }

}