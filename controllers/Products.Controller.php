<?php

class ProductsController extends Core
{
    public function CreateProductType(array $typeData, string $token)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($typeData['productTypeName']) && isset($typeData['typeLevel']))
        {
            $error = [];
            $typeName = Validate::stringBetween($typeData['productTypeName'], 2, 45) ? $typeData['productTypeName'] : $error['productTypeName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $typeLevel = Validate::intBetween($typeData['typeLevel'], 1, 99) ? (int)$typeData['typeLevel'] : $error['typeLevel'] = 'Sværhedsgraden skal være tal og mellem 0 og 99';

            if(sizeof($error) === 0)
            {
                if(self::$Model->InsertNewType($typeName, $typeLevel))
                {
                    return true;
                }
                else
                {
                    return ['err' => true, 'function' => 'Typen eksistere allerede'];
                }
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function EditProductType(array $typeData, string $token, int $ID)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($typeData['productTypeName']) && isset($typeData['typeLevel']))
        {
            $error = [];
            $typeName = Validate::stringBetween($typeData['productTypeName'], 2, 45) ? $typeData['productTypeName'] : $error['productTypeName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $typeLevel = Validate::intBetween($typeData['typeLevel'], 1, 99) ? (int)$typeData['typeLevel'] : $error['typeLevel'] = 'Sværhedsgraden skal være tal og mellem 0 og 99';

            if(sizeof($error) === 0)
            {
                if(self::$Model->EditType($typeName, $typeLevel, $ID))
                {
                    return true;
                }
                else
                {
                    return ['err' => true, 'function' => 'Typen eksistere allerede'];
                }
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function DeleteType(int $ID)
    {
        return self::$Model->DeleteTypeById($ID);
    }
}
