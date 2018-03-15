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
}