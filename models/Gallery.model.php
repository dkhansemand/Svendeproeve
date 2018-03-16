<?php

class GalleryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetEvents() : array
    {
        return $this->query("SELECT `eventsId`, `eventTitle` FROM `events` ORDER BY `eventTitle` ASC")->fetchAll();
    }

    public function InsertNewGallery(string $title, $event, int $albumCover, array $images)
    {
        $this->query("INSERT INTO `albums` SET `albumName` = :ANAME,
                                                `albumCoverId` = :CID,
                                                `albumEventId` = :EID;",
                                                [
                                                    ':ANAME' => $title,
                                                    ':CID' => $albumCover,
                                                    ':EID' => $event
                                                ]);

        $albumId = $this->query("SELECT `albumId` FROM `albums` WHERE `albumCoverId` = :CID;", [':CID' => $albumCover])->fetch()->albumId;

        foreach($images as $mediaId)
        {
            $this->query("INSERT INTO `gallery` SET `fkGalleryMediaId` = :MID, `fkAlbumId` = :AID;", [':MID' => $mediaId, ':AID' => $albumId]);
        }
        return true;
    }

    public function GetAlbums() : array
    {
        return $this->query("SELECT `albumId`, `albumName`, `eventTitle`, `filepath`, `filename` FROM `albums`
                                    LEFT JOIN `events` ON `albumEventId` = `eventsId`
                                    INNER JOIN `media` ON `albumCoverId` = `mediaId`;")->fetchAll();
    }

    public function GetGalleryByAlbumId(int $ID) : array
    {
        return $this->query("SELECT `albumId`, `albumName`, `eventTitle`, `mediaId`, `filepath`, `filename` FROM `gallery`
                                    INNER JOIN `albums` ON `fkAlbumId` = `albumId`
                                    LEFT JOIN `events` ON `albumEventId` = `eventsId`
                                    INNER JOIN `media` ON `fkGalleryMediaId` = `mediaId`
                                    WHERE `fkAlbumId` = :ID;", [':ID' => $ID])->fetchAll();
    }
}