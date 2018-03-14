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
}