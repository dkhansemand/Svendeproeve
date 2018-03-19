<?php

class ProductModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllTypes() : array
    {
        try
        {
        return $this->query("SELECT `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel` FROM `kajakTypes` ORDER BY `kajakTypeName` ASC")->fetchAll();
    }
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function GetTypeById(int $ID)
    {
        try
        {
        return $this->query("SELECT `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel` FROM `kajakTypes` WHERE `kajakTypeId` = :ID", [':ID' => $ID])->fetch();
    }
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function InsertNewType(string $typeName, int $typeLevel)
    {
        try
        {
        $existingType = $this->query("SELECT `kajakTypeId` FROM `kajakTypes` WHERE `kajakTypeName` = LOWER(:TNAME)", [':TNAME' => $typeName]);

        if($existingType->rowCount() === 0)
        {
            return $this->query("INSERT INTO `kajakTypes` SET `kajakTypeName` = :TNAME, `kajakTypeLevel` = :TLEVEL;", [':TNAME' => $typeName, ':TLEVEL' => $typeLevel]);
        }
        return false;
    }
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function EditType(string $typeName, int $typeLevel, int $ID)
    {
        try
        {
        $existingType = $this->query("SELECT `kajakTypeId` FROM `kajakTypes` WHERE `kajakTypeId` = :ID", [':ID' => $ID]);

        if($existingType->rowCount() === 1)
        {
            return $this->query("UPDATE `kajakTypes` SET `kajakTypeName` = :TNAME, `kajakTypeLevel` = :TLEVEL WHERE `kajakTypeId` = :ID;", [':TNAME' => $typeName, ':TLEVEL' => $typeLevel, ':ID' => $ID]);
        }
        return false;
    }
    catch(PDOException $err)
    {
        return false;
    }
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
        try
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
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function EditProduct(string $title, int $stock, int $type, $image = null, $salesPrice, int $ID)
    {
        try
        {
        if(is_numeric($salesPrice))
        {
            if($this->query("SELECT `salesId` FROM `sales` WHERE `salesKajakId` = :PID;", [':PID' => $ID])->rowCount() === 1)
            {
                $this->query("UPDATE `sales` SET `salesPrice` = :PRICE WHERE `salesKajakId` = :PID;", [':PID' => $ID, ':PRICE' => $salesPrice]);
            }else{
                $this->query("INSERT INTO `sales` SET `salesKajakId` = :PID, `salesPrice` = :PRICE;", [':PID' => $ID, ':PRICE' => $salesPrice]);
            }
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
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function DeleteProduct(int $ID)
    {
        try
        {
        $this->query("DELETE FROM `sales` WHERE `salesKajakId` = :PID;", [':PID' => $ID]);
        return $this->query("DELETE FROm `kajaks` WHERE `kajakId` = :ID", [':ID' => $ID]);
    }
    catch(PDOException $err)
    {
        return false;
    }
    }

    public function GetAllProducts() : array
    {
        try
        {
        return $this->query("SELECT `kajakId`, `kajakName`, `kajakStock`, `kajakTypeName`, `kajakTypeLevel`, `filepath`, `filename`, `salesPrice`
                                FROM `kajaks`
                                LEFT JOIN `sales` ON `salesKajakId` = `kajakId`
                                INNER JOIN `kajaktypes` ON `kajakTypeId` = `fkKajakType`
                                INNER JOIN `media` ON `mediaId` = `fkKajakMedia`
                                ORDER BY `kajakTypeName` ASC")->fetchAll();
                                }
                                catch(PDOException $err)
                                {
                                    return false;
                                }
    }

    public function GetProductById(int $ID)
    {
        try
        {
        return $this->query("SELECT `kajakName`, `kajakStock`, `kajakTypeId`, `kajakTypeName`, `kajakTypeLevel`, `mediaId`, `filepath`, `filename`, `salesPrice`
                                FROM `kajaks`
                                LEFT JOIN `sales` ON `salesKajakId` = `kajakId`
                                INNER JOIN `kajaktypes` ON `kajakTypeId` = `fkKajakType`
                                INNER JOIN `media` ON `mediaId` = `fkKajakMedia`
                                WHERE `kajakId` = :ID;", [':ID' => $ID])->fetch();
                                }
                                catch(PDOException $err)
                                {
                                    return false;
                                }
    }

    public function DeleteMediaId(int $mediaId)
    {
        try
        {
            return $this->query("DELETE FROM `media` WHERE `mediaId` = :ID", [':ID' => $mediaId]);
        }
        catch(PDOException $err)
        {
            return false;
        }
    }
}
