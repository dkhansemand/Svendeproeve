<?php

class Permission extends Database
{
    public const PERM_ADMIN_PANEL_ACCESS = 0,
                 PERM_ADMIN_CREATE_USER = 1,
                 PERM_ADMIN_UPDATE_USER = 2,
                 PERM_ADMIN_DELETE_USER = 3;
    
    protected static function GetPermissions() : array
    {
        $PERMS = [];
        $oClass = new ReflectionClass(__CLASS__);
        foreach($oClass->getConstants() as $CONST => $value)
        {
            if(preg_match("/PERM_*/", $CONST))
            {
                $PERMS[$CONST] = $value;
            }
        }
        return $PERMS;
    }

    public static function UpdateToDB() : bool
    {
        $QueryCurrentPermissions = (new self)->query("SELECT roleTypeInt FROM roletypes")->fetchAll();
        $AppDefinedPermissions = self::GetPermissions();
        $DBPerms = [];
        foreach($QueryCurrentPermissions as $QPerm)
        {
            $DBPerms[] = $QPerm->roleTypeInt;
        }
        $inserts = 0;
        foreach($AppDefinedPermissions as $PermissionName => $PermissionValue)
        {
            if(!in_array($PermissionValue, $DBPerms))
            {
                try
                {
                    (new self)->query("INSERT INTO roletypes SET roleTypeInt = :ROLEINT, roleTypeName = :ROLENAME", 
                                        [
                                            ':ROLEINT' => $PermissionValue,
                                            ':ROLENAME' => $PermissionName
                                        ]);
                    $inserts++;
                }
                catch(PDOException $err)
                {
                    return false;
                }
            }
        }
        return ( $inserts > 0);

        //return [$QueryCurrentPermissions, $AppDefinedPermissions];
    }
}
