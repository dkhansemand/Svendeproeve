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

   
}
