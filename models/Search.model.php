<?php

class SearchModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function FreeSearch($searhQuery) 
    {
        try
        {
            $results = [];
            $queryNews = $this->query("SELECT `newsId`, `newsTitle`, `newsContent`, `newsStartDate`
                                    FROM `news`
                                    WHERE false 
                                    OR `newsTitle` LIKE CONCAT('%', :SQ, '%' ) 
                                    OR `newsContent` LIKE CONCAT('%', :SQ, '%');", 
                                    [
                                        ':SQ' => $searhQuery
                                    ])->fetchAll();
            array_push($results, $queryNews);
            $queryEvents = $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename` FROM `events`
                                                INNER JOIN `media` ON `mediaId` = `eventCover`
                                                WHERE false 
                                                OR `eventTitle` LIKE CONCAT('%', :SQ, '%')
                                                OR `eventDescription` LIKE CONCAT('%', :SQ, '%');", 
                                                [
                                                    ':SQ' => $searhQuery
                                                ])->fetchAll();
            array_push($results, $queryEvents);
            return $results;
        }
        catch(PDOException $err)
        {
            return false;
        }
    }
}
