<?php

namespace App\Models;

final class TokenModel{


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @var string
     */
    private $expired_at;

    /**
     * @var int
     */
    private $usuario_id;


    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id):TokenModel{
        $this->id =  $id;
        return $this;
    }

    public function getToken(): string{
        return $this->token;
    }

    public function setToken(string $token):TokenModel{
        $this->token =  $token;
        return $this;
    }

    public function getRefreshToken(): string{
        return $this->refreshToken;
    }

    public function setRefreshToken(string $refreshToken):TokenModel{
        $this->refreshToken =  $refreshToken;
        return $this;
    }

    public function getExpired_at(): string{
        return $this->expired_at;
    }

    public function setExpired_at(string $expired_at):TokenModel{
        $this->expired_at = $expired_at;
        return $this;
    }

    public function getUsuario_id(): int{
        return $this->usuario_id;
    }

    public function setUsuario_id(int $usuario_id):TokenModel{
        $this->usuario_id =  $usuario_id;
        return $this;
    }



}