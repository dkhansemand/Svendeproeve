<?php

class ProfileModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function GetUserInfo(int $ID) 
    {
        try
        {
            return $this->query("SELECT `userId`, `userEmail`, `fullname`, `userKm`, `userPhone`, `roleName`, `userLevelName`, `filename` FROM `users`
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
}