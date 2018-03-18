<?php

class User extends Database
{
    public static function GetUserPermissions(int $UserID) : array
    {
        try
        {
            return (new self)->query("SELECT roleTypeName, roleTypeInt FROM users
                                        INNER JOIN roles ON fkUserRole = userRole
                                        INNER JOIN roleTypes ON fkRoleType = roleTypeId
                                        WHERE userId = :ID", 
                                [
                                    ':ID' => $UserID
                                ])->fetchAll();
        }
        catch(PDOException $err)
        {
            return [];
        }
    }

    public static function GetUserInfo(int $ID) 
    {
        try
        {
            return (new self)->query("SELECT `userId`, `userEmail`, `fullname`, `userKm`, `userPhone`, `roleName` FROM `users`
                                        INNER JOIN `userroles` ON `roleId` = `userRole`
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

   
}
