<?php

class LoginController extends Core
{
    public function __construct()
    {
        
    }

    public function VerifyLogin(array $loginData, string $token)
    {
        if(!Token::validateToken($token)){
            return false;
        }
        if(isset($loginData['username']) && isset($loginData['password']))
        {
            $user = Validate::email($loginData['username']) ? $loginData['username'] : null;
            $user = is_null($user) ? (Validate::stringBetween($loginData['username'], 2, 25) ? $loginData['username'] : null) : $user;
            $loginResult = self::$Model->Login($user, $loginData['password']);
            if($loginResult !== false){
                (new Guard)->Authenticate($loginResult);
                return true;
            }else{
                return false;
            }
        }
    }
}
