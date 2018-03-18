<?php

class ContactModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function SubmitMessage(string $name, string $email, $phone, string $message)
    {
        try
        {
            return $this->query("INSERT INTO `contacts` SET `contactName` = :CNAME,
                                                            `contactEmail` = :EMAIL,
                                                            `contactMobile` = :PHONE,
                                                            `contactMessage` = :MSG;", 
                                                            [
                                                                ':CNAME' => $name,
                                                                ':EMAIL' => $email,
                                                                ':PHONE' => $phone,
                                                                ':MSG' => $message
                                                            ]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetAllMessages() : array
    {
        return $this->query("SELECT `contactId`, `contactName`, `contactEmail`, `contactMobile`, `contactMessage` FROM `contacts` ORDER BY `contactId` DESC")->fetchAll();
    }

    public function DeleteMessageById(int $ID)
    {
        return $this->query("DELETE FROM `contacts` WHERE `contactId` = :ID", [':ID' => $ID]);
    }
}
