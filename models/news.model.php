<?php

class NewsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function InsertArticle(string $title, string $content, string $startDate, string $endDate)
    {
        try
        {
        return $this->query("INSERT INTO `news` SET `newsTitle` = :TITLE, 
                                                    `newsContent` = :CONTENT,
                                                    `newsStartDate` = :SDATE,
                                                    `newsEndDate` = :EDATE;", 
                                    [
                                        ':TITLE' => $title,
                                        ':CONTENT' => $content,
                                        ':SDATE' => $startDate,
                                        ':EDATE' => $endDate
                                    ]);
                                }
                                catch(PDOException $err)
                                {
                                    return false;
                                }
    }

    public function EditArticle(string $title, string $content, string $startDate, string $endDate, int $ID)
    {
        try
        {
        return $this->query("UPDATE `news` SET `newsTitle` = :TITLE, 
                                               `newsContent` = :CONTENT,
                                               `newsStartDate` = :SDATE,
                                               `newsEndDate` = :EDATE
                                         WHERE `newsId` = :ID;", 
                                            [
                                            ':TITLE' => $title,
                                            ':CONTENT' => $content,
                                            ':SDATE' => $startDate,
                                            ':EDATE' => $endDate,
                                            ':ID' => $ID
                                            ]);
                                        }
                                        catch(PDOException $err)
                                        {
                                            return false;
                                        }
    }

    public function DeleteArticle(int $ID)
    {
        try
        {
            return $this->query("DELETE FROM `news` WHERE `newsId` = :ID", [':ID' => $ID]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetAllArticles() : array
    {
        try
        {
            return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate`, `newsEndDate` FROM `news` ORDER BY `newsId` DESC")->fetchAll();
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetArticleById(int $ID) : stdClass
    {
        try
        {
            return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate`, `newsEndDate` FROM `news` WHERE `newsId` = :ID", [':ID' => $ID])->fetch();
        }
        catch(PDOException $err)
        {
            return false;
        }        
    }

    public function GetAllArticlesByDate() : array
    {
        try
        {
            return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate` FROM `news` WHERE DATE(NOW()) between `newsStartDate` AND `newsEndDate`ORDER BY `newsStartDate` DESC;")->fetchAll();
        }
        catch(PDOException $err)
        {
            return false;
        }
    }
}
