<?php

class Misc extends Database
{

    public static function GetMssagesCount()
    {
        return (new self)->query("SELECT COUNT(`contactId`) AS `messages` FROM `contacts`")->fetch();
    }

}

