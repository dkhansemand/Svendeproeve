<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        return null;
    }

    public function Login(string $user, string $pwd)
    {
        if(is_null($user) || is_null($pwd))
        {
            return false;
        }
        $userQuery = $this->query("SELECT `userId`, `username`, `password`, `fullname`, `userEmail` 
                                    FROM `users` 
                                    WHERE `username` = LOWER(:UNAME) OR `userEmail` = LOWER(:UNAME)", 
                                    [
                                        ':UNAME' => $user
                                    ]);
        if($userQuery->rowCount() === 1)
        {
            $userInfo = $userQuery->fetch();
            //var_dump($userInfo);
            if( ($user === $userInfo->username || $user === $userInfo->userEmail)
                && password_verify($pwd, $userInfo->password))
            {
                return $userInfo;
            }
        }
        return false;
    }

}
