<?php

class EventsModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllEvents() : array
    {
        try
        {
         return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`")->fetchAll();
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetEventSubs($eventId)
    {
        try
        {
            return $this->query("SELECT COUNT(`eventSubscriberId`) AS `eventSubs` FROM `eventsubscribers` WHERE `fkEventId` = :EID", [':EID' => $eventId])->fetch()->eventSubs;
        }
        catch(PDOException $err)
        {
 
        }
    }

    public function GetCurrentEvents() : array
    {
        try
        {
            return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`
                                    WHERE `eventStartDate` >= DATE(NOW()) ORDER BY `eventStartDate` ASC")->fetchAll();
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function GetEventById(int $ID) : stdClass
    {
        try
        {
            return $this->query("SELECT `eventsId`, `eventTitle`, `eventDescription`,`eventStartDate`, `filename`, `filepath` FROM `events`
                                    INNER JOIN `media` ON `eventCover` = `mediaId`
                                    WHERE `eventsId` = :ID", [':ID' => $ID])->fetch();
                                    }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function InsertNewEvent(string $title, string $text, string $startDate, int $coverID)
    {
        try
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
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function EditEvent(string $title, string $text, string $startDate, int $ID, $coverID = null)
    {
        try
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
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function DeleteEvent(int $ID)
    {
        try
        {
            $mediaCover = $this->query("SELECT `eventCover` FROM `events` WHERE `eventsId` = :ID", [':ID' => $ID])->fetch();
            $this->query("DELETE FROM `eventsubscribers` WHERE `fkEventId` = :ID", [':ID' => $ID]);
            $this->query("DELETE FROM `events` WHERE `eventsId` = :ID", [':ID' => $ID]);
            $this->query("DELETE FROM `media` WHERE `mediaId` = :MEDIAID;", [':MEDIAID' => $mediaCover->eventCover]);
            return true;
        }
        catch(PdoException $err)
        {
            return false;
        }
    }

    public function AddSubscriber($userId, $eventId)
    {
        try
        {
            return $this->query("INSERT INTO `eventsubscribers` SET `fkEventSubUserId` = :ID, `fkEventId` = :EID", [':ID' => $userId, ':EID' => $eventId]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }
}
