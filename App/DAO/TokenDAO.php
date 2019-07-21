<?php

namespace App\DAO;

use App\Models\TokenModel;

class TokenDAO extends Conexao{

    public function __construct(){

        parent::__construct();
        
    }

    public function createToken(TokenModel $token):void{

        $data = $this->pdo
            ->prepare('INSERT INTO token(
                        token,
                        refresh_token,
                        expired_at,
                        idusuario
                    )
                    VALUES
                    (
                        :token,
                        :refresh_token,
                        :expired_at,
                        :idusuario
                    );');
        $data->execute([
            'token' => $token->getToken(),
            'refresh_token' => $token->getRefreshToken(),
            'expired_at' => $token->getExpired_at(),
            'idusuario' => $token->getUsuario_id()
        ]);
    }

    public function verificarRefreshToken(string  $refreshToken):bool {
        
        $data = $this->pdo
            ->prepare('SELECT
                        id
                        FROM token
                        WHERE refresh_token = :refresh_token AND active = 1'
                    );
        $data->bindParam('refresh_token', $refreshToken);
        $data->execute();
        $token = $data->fetchAll(\PDO::FETCH_ASSOC);

        return count($token)===0 ? false : true; 
    }

    public function verificarToken(string  $token):bool {
        
        $data = $this->pdo
            ->prepare('SELECT
                        id
                        FROM token
                        WHERE token = :token AND active = 1'
                    );
        $data->bindParam('token', $token);
        $data->execute();
        $token = $data->fetchAll(\PDO::FETCH_ASSOC);

        return count($token)===0 ? false : true; 
    }

    public function ableDisableRefresToken(string $refresh_token, int $valor):void{

        $data = $this->pdo
            ->prepare('UPDATE token SET
                        active = :valor
                        WHERE refresh_token = :refresh_token;');
        $data->execute([
            'valor' => $valor,
            'refresh_token' => $refresh_token
        ]);
    }
    public function deleteToken(string $token):void{

        $data = $this->pdo
            ->prepare('DELETE FROM token 
                        WHERE token = :token;');
        $data->execute([
            'token' => $token
        ]);
    }
}