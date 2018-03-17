<?php

class ProductModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllTypes() : array
    {
        return $this->query("SELECT `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel` FROM `kajakTypes` ORDER BY `kajakTypeName` ASC")->fetchAll();
    }

    public function GetTypeById(int $ID)
    {
        return $this->query("SELECT `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel` FROM `kajakTypes` WHERE `kajakTypeId` = :ID", [':ID' => $ID])->fetch();
    }

    public function InsertNewType(string $typeName, int $typeLevel)
    {
        $existingType = $this->query("SELECT `kajakTypeId` FROM `kajakTypes` WHERE `kajakTypeName` = LOWER(:TNAME)", [':TNAME' => $typeName]);

        if($existingType->rowCount() === 0)
        {
            return $this->query("INSERT INTO `kajakTypes` SET `kajakTypeName` = :TNAME, `kajakTypeLevel` = :TLEVEL;", [':TNAME' => $typeName, ':TLEVEL' => $typeLevel]);
        }
        return false;
    }

    public function EditType(string $typeName, int $typeLevel, int $ID)
    {
        $existingType = $this->query("SELECT `kajakTypeId` FROM `kajakTypes` WHERE `kajakTypeId` = :ID", [':ID' => $ID]);

        if($existingType->rowCount() === 1)
        {
            return $this->query("UPDATE `kajakTypes` SET `kajakTypeName` = :TNAME, `kajakTypeLevel` = :TLEVEL WHERE `kajakTypeId` = :ID;", [':TNAME' => $typeName, ':TLEVEL' => $typeLevel, ':ID' => $ID]);
        }
        return false;
    }

    public function DeleteTypeById(int $ID)
    {
        try
        {
            return $this->query("DELETE FROM `kajakTypes` WHERE `kajakTypeId` = :ID", [':ID' => $ID]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }

    public function InsertProduct(string $title, int $stock, int $type, int $image, $salesPrice)
    {
        if(is_null($salesPrice))
        {
            return $this->query("INSERT INTO `kajaks` SET `kajakName` = :KNAME, 
                                                        `kajakStock` = :STOCK,
                                                        `fkKajakType` = :KTYPE,
                                                        `fkKajakMedia` = :MEDIAID",
                                                        [
                                                            ':KNAME' => $title,
                                                            ':STOCK' => $stock,
                                                            ':KTYPE' => $type,
                                                            ':MEDIAID' => $image
                                                        ]);
        }
        elseif(is_numeric($salesPrice))
        {
            $this->query("INSERT INTO `kajaks` SET `kajakName` = :KNAME, 
                                                    `kajakStock` = :STOCK,
                                                    `fkKajakType` = :KTYPE,
                                                    `fkKajakMedia` = :MEDIAID",
                                                    [
                                                        ':KNAME' => $title,
                                                        ':STOCK' => $stock,
                                                        ':KTYPE' => $type,
                                                        ':MEDIAID' => $image
                                                    ]);
            $productId = $this->query("SELECT `kajakId` FROM `kajaks` WHERE `kajakName` = LOWER(:KNAME);", [':KNAME' => $title])->fetch()->kajakId;
            return $this->query("INSERT INTO `sales` SET `salesKajakId` = :PID, `salesPrice` = :PRICE;", [':PID' => $productId, ':PRICE' => $salesPrice]);

        }
        return false;
    }

    public function EditProduct(string $title, int $stock, int $type, $image = null, $salesPrice, int $ID)
    {
        if(is_numeric($salesPrice))
        {
            $this->query("UPDATE `sales` SET `salesPrice` = :PRICE WHERE `salesKajakId` = :PID;", [':PID' => $ID, ':PRICE' => $salesPrice]);
        }
        
        if(is_null($image))
        {
            return $this->query("UPDATE `kajaks` SET `kajakName` = :KNAME, 
                                                        `kajakStock` = :STOCK,
                                                        `fkKajakType` = :KTYPE
                                                WHERE `kajakId` = :ID;",
                                                        [
                                                            ':KNAME' => $title,
                                                            ':STOCK' => $stock,
                                                            ':KTYPE' => $type,
                                                            ':ID' => $ID
                                                        ]);
        }
        else
        {
            return $this->query("UPDATE `kajaks` SET `kajakName` = :KNAME, 
                                                        `kajakStock` = :STOCK,
                                                        `fkKajakType` = :KTYPE,
                                                        `fkKajakMedia` = :MEDIAID
                                                WHERE `kajakId` = :ID;",
                                                        [
                                                            ':KNAME' => $title,
                                                            ':STOCK' => $stock,
                                                            ':KTYPE' => $type,
                                                            ':MEDIAID' => $image,
                                                            ':ID' => $ID
                                                        ]);
        }
        
        return false;
    }

    public function DeleteProduct(int $ID)
    {
        $this->query("DELETE FROM `sales` WHERE `salesKajakId` = :PID;", [':PID' => $ID]);
        return $this->query("DELETE FROm `kajaks` WHERE `kajakId` = :ID", [':ID' => $ID]);
    }

    public function GetAllProducts() : array
    {
        return $this->query("SELECT `kajakId`, `kajakName`, `kajakStock`, `kajakTypeName`, `kajakTypeLevel`, `filepath`, `filename`, `salesPrice`
                                FROM `kajaks`
                                LEFT JOIN `sales` ON `salesKajakId` = `kajakId`
                                INNER JOIN `kajaktypes` ON `kajakTypeId` = `fkKajakType`
                                INNER JOIN `media` ON `mediaId` = `fkKajakMedia`")->fetchAll();
    }

    public function GetProductById(int $ID)
    {
        return $this->query("SELECT `kajakName`, `kajakStock`, `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel`, `mediaId`, `filepath`, `filename`, `salesPrice`
                                FROM `kajaks`
                                LEFT JOIN `sales` ON `salesKajakId` = `kajakId`
                                INNER JOIN `kajaktypes` ON `kajakTypeId` = `fkKajakType`
                                INNER JOIN `media` ON `mediaId` = `fkKajakMedia`
                                WHERE `kajakId` = :ID;", [':ID' => $ID])->fetch();
    }

    public function DeleteMediaId(int $mediaId)
    {
        return $this->query("DELETE FROM `media` WHERE `mediaId` = :ID", [':ID' => $mediaId]);
    }
}
