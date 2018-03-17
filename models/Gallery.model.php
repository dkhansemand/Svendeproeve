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

    public function EditGallery(string $title, $event, int $albumCover, array $images = [], int $ID)
    {
        $this->query("UPDATE `albums` SET `albumName` = :ANAME,
                                            `albumCoverId` = :CID,
                                            `albumEventId` = :EID
                                            WHERE `albumId` = :ID;",
                                            [
                                                ':ANAME' => $title,
                                                ':CID' => $albumCover,
                                                ':EID' => $event,
                                                ':ID' => $ID
                                            ]);

        $albumId = $this->query("SELECT `albumId` FROM `albums` WHERE `albumCoverId` = :CID;", [':CID' => $albumCover])->fetch()->albumId;
        if(sizeof($images) > 0)
        {
            foreach($images as $mediaId)
            {
                $this->query("INSERT INTO `gallery` SET `fkGalleryMediaId` = :MID, `fkAlbumId` = :AID;", [':MID' => $mediaId, ':AID' => $albumId]);
            }
        }
        return true;
    }

    public function DeleteMediaId(int $mediaId)
    {
        return $this->query("DELETE FROM `gallery` WHERE `fkGalleryMediaId` = :ID; DELETE FROM `media` WHERE `mediaId` = :ID", [':ID' => $mediaId]);
    }

    public function GetMediaInfoById(int $ID)
    {
        return $this->query("SELECT `mediaId`,`filepath`, `filename` FROM media WHERE `mediaId` = :ID", [':ID' => $ID])->fetch();
    }

    public function GetMediaInfoByFilename(string $filename)
    {
        return $this->query("SELECT `mediaId`,`filepath`, `filename` FROM media WHERE `filename` LIKE CONCAT('%', :FNAME);", [':FNAME' => $filename])->fetch();
    }

    public function GetGalleryImages(int $albumId) : array
    {
        return $this->query("SELECT `mediaId`, `filepath`, `filename` FROM `gallery`
                                INNER JOIN `media` ON `fkGalleryMediaId` = `mediaId`
                                WHERE `fkAlbumId` = :AID", [':AID' => $albumId])->fetchAll();
    }

    public function GetAlbums() : array
    {
        return $this->query("SELECT `albumId`, `albumName`, `eventTitle`, `filepath`, `filename` FROM `albums`
                                    LEFT JOIN `events` ON `albumEventId` = `eventsId`
                                    INNER JOIN `media` ON `albumCoverId` = `mediaId`;")->fetchAll();
    }

    public function GetGalleryByAlbumId(int $ID) : array
    {
        return $this->query("SELECT `albumId`, `albumName`, `albumCoverId`, `eventsId`, `eventTitle`, `mediaId`, `filepath`, `filename` FROM `gallery`
                                    INNER JOIN `albums` ON `fkAlbumId` = `albumId`
                                    LEFT JOIN `events` ON `albumEventId` = `eventsId`
                                    INNER JOIN `media` ON `fkGalleryMediaId` = `mediaId`
                                    WHERE `fkAlbumId` = :ID;", [':ID' => $ID])->fetchAll();
    }

    public function DeleteGallery(int $ID)
    { 
            return $this->query("DELETE FROM `gallery` WHERE `fkAlbumId` = :ID; DELETE FROM `albums` WHERE `albumId` = :ID", [':ID' => $ID]);   
    }
}