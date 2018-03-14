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

    public function InsertNewEvent(string $title, string $text, string $startDate, int $coverID)
    {
        return $this->query("INSERT INTO events SET `eventTitle` = :TITLE, 
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
}