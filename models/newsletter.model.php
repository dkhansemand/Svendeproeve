<?php

class NewsletterModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        
      
    }

    public function AddSubscriber(string $email)
    {
        try
        {
            $exists = $this->query("SELECT `subscriberEmail` FROM `newslettersubscribers` WHERE `subscriberEmail` = LOWER(:EMAIL)", [':EMAIL' => $email]);
            if($exists->rowCount() === 0)
            {
                $this->query("INSERT INTO `newslettersubscribers` SET `subscriberEmail` = :EMAIL", [':EMAIL' => $email]);
                return true;
            }
            return false;
        }
        catch(PDOException $err)
        {
            //var_dump($err->getMessage());
            return false;
        }
    }

    public function GetSubscribers() : array
    {
        try
        {
            return $this->query("SELECT `subscriberEmail` FROM `newslettersubscribers`")->fetchAll();
        }
        catch(PDOExecption $err)
        {
            return [];
        }
    }
}
