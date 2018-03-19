<?php

class MembersModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function GetAllMembers() : array
    {
        try
        {
            return $this->query("SELECT `userId`, `userEmail`, `fullname`, `userKm`, `userPhone`, `roleName`, `userLevelName` FROM `users`
                                    INNER JOIN `userroles` ON `roleId` = `userRole`
                                    INNER JOIN `userlevels` ON `userKm` >= `userLevelReqKm`
                                    LEFT JOIN `media` ON `mediaId` = `avatar`")->fetchAll();
                                    }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetUserRoles() : array
    {
        return $this->query("SELECT `roleId`, `roleName` FROM `userroles` ORDER BY `roleName` ASC")->fetchAll();
    }

    public function GetUserInfo(int $ID) 
    {
        try
        {
            return $this->query("SELECT `userId`, `userEmail`, `fullname`, `userKm`, `userPhone`, `userRole`, `roleName`, `userLevelName` FROM `users`
                                        INNER JOIN `userroles` ON `roleId` = `userRole`
                                        INNER JOIN `userlevels` ON `userKm` >= `userLevelReqKm`
                                        LEFT JOIN `media` ON `mediaId` = `avatar`
                                        WHERE `userId` = :ID", 
                                [
                                    ':ID' => $ID
                                ])->fetch();
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function InsertNewMember($name, $email, $memberKm, $role, $password, $phone = null, $image = null)
    {
        try
        {
            $existingMember = $this->query("SELECT `userId` FROM `users` WHERE `userEmail` = LOWER(:EMAIL)", [':EMAIL' => $email]);
            if($existingMember->rowCount() === 0)
            {
                return $this->query("INSERT INTO `users` SET `fullname` = :FNAME,
                                                            `userEmail` = :EMAIL,
                                                            `userKm` = :KM,
                                                            `userRole` = :ROLEID,
                                                            `password` = :PWD,
                                                            `avatar` = :AID,
                                                            `userPhone` = :PHONE;",
                                                            [
                                                                ':FNAME' => $name,
                                                                ':EMAIL' => $email,
                                                                ':KM' => $memberKm,
                                                                ':ROLEID' => $role,
                                                                ':PWD' => $password,
                                                                ':AID' => $image,
                                                                ':PHONE' => $phone
                                                            ]);
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function EditMember($ID, $name, $email, $memberKm, $role, $password = null, $phone = null, $image = null)
    {
        try
        {
            
                if(!is_null($password))
                {
                    $this->query("UPDATE `users` SET `password` = :PWD WHERE `userId` = :ID", [':ID' => $ID, ':PWD' => $password]);
                }

                if(!is_null($image))
                {
                    return $this->query("UPDATE `users` SET `fullname` = :FNAME,
                                                            `userEmail` = :EMAIL,
                                                            `userKm` = :KM,
                                                            `userRole` = :ROLEID,
                                                            `avatar` = :AID,
                                                            `userPhone` = :PHONE
                                                    WHERE `userId` = :ID",
                                                            [
                                                                ':FNAME' => $name,
                                                                ':EMAIL' => $email,
                                                                ':KM' => $memberKm,
                                                                ':ROLEID' => $role,
                                                                ':AID' => $image,
                                                                ':PHONE' => $phone,
                                                                ':ID' => $ID
                                                            ]);
                }

                if(is_null($image))
                {
                    return $this->query("UPDATE `users` SET `fullname` = :FNAME,
                                                            `userEmail` = :EMAIL,
                                                            `userKm` = :KM,
                                                            `userRole` = :ROLEID,
                                                            `userPhone` = :PHONE
                                                        WHERE `userId` = :ID",
                                                            [
                                                                ':FNAME' => $name,
                                                                ':EMAIL' => $email,
                                                                ':KM' => $memberKm,
                                                                ':ROLEID' => $role,
                                                                ':PHONE' => $phone,
                                                                ':ID' => $ID
                                                            ]);
                }
            
           
        }
        catch(PDOException $err)
        {
            //var_dump($err->getMessage());
            return false;
        }
    }

    public function DeleteMember($ID)
    {
        try
        {
         return $this->query("DELETE FROM `users` WHERE `userId` = :ID", [':ID' => $ID]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }
}