<?php

class NewsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function InsertArticle(string $title, string $content, string $startDate, string $endDate)
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

    public function EditArticle(string $title, string $content, string $startDate, string $endDate, int $ID)
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

    public function DeleteArticle(int $ID)
    {
        return $this->query("DELETE FROM `news` WHERE `newsId` = :ID", [':ID' => $ID]);
    }

    public function GetAllArticles() : array
    {
        return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate`, `newsEndDate` FROM `news` ORDER BY `newsId` DESC")->fetchAll();
    }

    public function GetArticleById(int $ID) : stdClass
    {
        return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate`, `newsEndDate` FROM `news` WHERE `newsId` = :ID", [':ID' => $ID])->fetch();
    }

    public function GetAllArticlesByDate() : array
    {
        return $this->query("SELECT `newsId`,`newsTitle`, `newsContent`, `newsStartDate` FROM `news` WHERE DATE(NOW()) between `newsStartDate` AND `newsEndDate`ORDER BY `newsStartDate` DESC;")->fetchAll();
    }
}
