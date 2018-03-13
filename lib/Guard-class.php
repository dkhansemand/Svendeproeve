<?php
require_once _AUTOLOADER_;
use \Firebase\JWT\JWT;
class Guard extends JWT
{
    private static $Permissions =  [];
    public function Authenticate(stdClass $userData)
    {
        $userData->IP = $_SERVER['REMOTE_ADDR'];
        $payload = array(
            "iss" => "Modul test",
            "aud" => $userData->userId,
            "exp" => strtotime("+2 hour"),
            "iat" => time(), // Time stamp
            "nbf" => time(), // Time Stamp          
            "exp" => strtotime("+1 hour"),
            "data" => $userData
        );
        $_SESSION['global'] = JWT::encode($payload, _JWTKEY_);
        
    }

    public function __construct()
    {
        try
        {
            if(!array_key_exists('global', $_SESSION))
            {
                $_SESSION['global'] = null;
            }
        }
        catch(Exception $e)
        {
            throw new Exception("ERROR [GUARD]: " . $e->getMessage());
        }
    }

    public function Protect(array $permissions, string $redirectURL = '/')
    {
        try
        {
            self::$Permissions = &$permissions;
            if(!isset($_SESSION['global']) && is_null($_SESSION['global']))
            {
                Session::set('referer', $redirectURL);
                Router::Redirect('/Login');
                return false;
            }
            
            if(sizeof(self::$Permissions) === 0)
            {
                return true;
            }

            if(self::decoding($_SESSION['global'])->data->IP !== $_SERVER['REMOTE_ADDR'])
            {
                unset($_SESSION['global']);
                Router::Redirect('/');
                exit;
            }

            $permCnt = 0;
            $UserPermissions = User::GetUserPermissions( self::decoding($_SESSION['global'])->data->userId );

            foreach($UserPermissions as $userPerm)
            {   
                if(in_array($userPerm->roleTypeInt, self::$Permissions))
                {
                    $permCnt++;
                }
            }

            if( $permCnt !== sizeof(self::$Permissions) )
            {
                Router::Redirect('/Error/403');
            }
        }
        catch(Exception $err)
        {
            session_destroy();
            Router::Redirect('/Error/500');
            exit;
        }
    }

    public function decoding($Session)
    {
        try
        {
            return JWT::decode($Session, _JWTKEY_, array('HS256'));
        }
        catch(Exception $err)
        {
            unset($_SESSION['global']);
            Router::Redirect('/');
        }
    }

}
