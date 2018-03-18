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
}
