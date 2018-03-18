<?php

class Permission extends Database
{
    public const PERM_ADMIN_PANEL_ACCESS = 0,
                 PERM_ADMIN_CREATE_USER = 1,
                 PERM_ADMIN_UPDATE_USER = 2,
                 PERM_ADMIN_DELETE_USER = 3,
                 PERM_ADMIN_NEWS_CREATE = 4,
                 PERM_ADMIN_NEWS_UPDATE = 5,
                 PERM_ADMIN_NEWS_DELETE = 6,
                 PERM_ADMIN_EVENT_CREATE = 7,
                 PERM_ADMIN_EVENT_UPDATE = 8,
                 PERM_ADMIN_EVENT_DELETE = 9,
                 PERM_ADMIN_PRODUCT_CREATE = 10,
                 PERM_ADMIN_PRODUCT_UPDATE = 11,
                 PERM_ADMIN_PRODUCT_DELETE = 12,
                 PERM_ADMIN_GALLERY_CREATE = 13,
                 PERM_ADMIN_GALLERY_UPDATE = 14,
                 PERM_ADMIN_GALLERY_DELETE = 15,
                 PERM_ADMIN_MESSAGE_DELETE = 16;
    
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
