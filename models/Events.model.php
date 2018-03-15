<?php

class EventsModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllEvents() : array
    {
        return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`")->fetchAll();
    }

    public function GetCurrentEvents() : array
    {
        return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`
                                    WHERE `eventStartDate` >= DATE(NOW()) ORDER BY `eventStartDate` ASC")->fetchAll();
    }

    public function GetEventById(int $ID) : stdClass
    {
        return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`
                                    WHERE `eventsId` = :ID", [':ID' => $ID])->fetch();
    }

    public function InsertNewEvent(string $title, string $text, string $startDate, int $coverID)
    {
        return $this->query("INSERT INTO `events` SET `eventTitle` = :TITLE, 
                                                    `eventDescription` = :EDESC,
                                                    `eventStartDate` = :EDATE,
                                                    `eventCover` = :COVERID",
                                                    [
                                                        ':TITLE' => $title,
                                                        ':EDESC' => $text,
                                                        ':EDATE' => $startDate,
                                                        ':COVERID' => $coverID
                                                    ]);
    }

    public function EditEvent(string $title, string $text, string $startDate, int $ID, $coverID = null)
    {
        if(is_null($coverID))
        {
            return $this->query("UPDATE `events` SET `eventTitle` = :TITLE,
                                                     `eventDescription` = :EDESC,
                                                     `eventStartDate` = :EDATE
                                               WHERE `eventsId` = :ID",
                                                    [
                                                        ':TITLE' => $title,
                                                        ':EDESC' => $text,
                                                        ':EDATE' => $startDate,
                                                        ':ID' => $ID    
                                                    ]);
        }
        elseif(is_numeric($coverID))
        {
            $this->query("DELETE FROM `media` WHERE mediaId = (SELECT `eventCOver` FROM `events` WHERE `eventsId` = :ID);", [':ID' => $ID]);
            return $this->query("UPDATE `events` SET `eventTitle` = :TITLE,
                                                     `eventDescription` = :EDESC,
                                                     `eventStartDate` = :EDATE,
                                                     `eventCover` = :COVER
                                               WHERE `eventsId` = :ID",
                                                    [
                                                        ':TITLE' => $title,
                                                        ':EDESC' => $text,
                                                        ':EDATE' => $startDate,
                                                        ':COVER' => $coverID,
                                                        ':ID' => $ID    
                                                    ]);
        }
    }

    public function DeleteEvent(int $ID)
    {
        $this->query("DELETE FROM `media` WHERE mediaId = (SELECT `eventCOver` FROM `events` WHERE `eventsId` = :ID);", [':ID' => $ID]);
        return $this->query("DELETE FROM `events` WHERE `eventsId` = :ID", [':ID' => $ID]);
    }
}