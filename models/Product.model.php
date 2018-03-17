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

}
