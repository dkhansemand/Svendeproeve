<?php

class ProductsController extends Core
{
    public function CreateProductType(array $typeData, string $token)
    {
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($typeData['productTypeName']) && isset($typeData['typeLevel']))
        {
            $error = [];
            $typeName = Validate::stringBetween($typeData['productTypeName'], 2, 45) ? $typeData['productTypeName'] : $error['productTypeName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $typeLevel = Validate::intMinMax((int)$typeData['typeLevel'], 1, 11) ? (int)$typeData['typeLevel'] : $error['typeLevel'] = 'Sværhedsgraden skal være tal og mellem 0 og 99';

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
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($typeData['productTypeName']) && isset($typeData['typeLevel']))
        {
            $error = [];
            $typeName = Validate::stringBetween($typeData['productTypeName'], 2, 45) ? $typeData['productTypeName'] : $error['productTypeName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $typeLevel = Validate::intMinMax((int)$typeData['typeLevel'], 1, 11) ? (int)$typeData['typeLevel'] : $error['typeLevel'] = 'Sværhedsgraden skal være tal og mellem 0 og 99';

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

    public function InsertNewProduct(array $productData, string $fileinput, string $token)
    {
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($productData['productName']) && isset($productData['productStock']) 
            && isset($productData['productType']) && isset($_FILES[$fileinput]))
        {
            $error = [];
            $salesPrice = null;
            $title = Validate::stringBetween($productData['productName'], 2, 52) ? $productData['productName'] : $error['productName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 52 tegn';
            $stock = Validate::intBetween((int)$productData['productStock'], 1, 999999) ? (int)$productData['productStock'] : $error['productStock'] = 'Antal skal angives og være kun i tal';
            $productType = ($productData['productType'] != '0') ? (int)$productData['productType'] : $error['productType'] = 'Der skal vælges en kajaktype';
            
            if(!empty($productData['productPrice']))
            {
                $salesPrice = is_numeric($productData['productPrice']) ? $productData['productPrice'] : $error['productPrice'] = 'prisen er ikke angiver i korrekt format.';
            }

            if(sizeof($error) === 0)
            {
                $upload = MediaUpload::UploadImage($fileinput);
                if(!$upload['err'] && self::$Model->InsertProduct($title, $stock, $productType, $upload['data'],  $salesPrice))
                {
                    return true;
                }
                return ['err' => true, 'insert' => 'Data kunne ikke sættes ind i databasen. <br> '. $upload['data']];
            }
            else
            {
                return ['err' => true, 'errors' => $error];
            }

        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function EditProduct(array $productData, string $fileinput, string $token, int $ID)
    {
        if(isset($token) &&  !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($productData['productName']) && isset($productData['productStock']) 
            && isset($productData['productType']))
        {
            $error = [];
            $salesPrice = null;
            $title = Validate::stringBetween($productData['productName'], 2, 52) ? $productData['productName'] : $error['productName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 52 tegn';
            $stock = Validate::intBetween((int)$productData['productStock'], 1, 999999) ? (int)$productData['productStock'] : $error['productStock'] = 'Antal skal angives og være kun i tal';
            $productType = ($productData['productType'] != '0') ? (int)$productData['productType'] : $error['productType'] = 'Der skal vælges en kajaktype';
            
            if(!empty($productData['productPrice']))
            {
                $salesPrice = is_numeric($productData['productPrice']) ? (int)$productData['productPrice'] : $error['productPrice'] = 'prisen er ikke angiver i korrekt format.';
            }else{
                $salesPrice = NULL;
            }

            if(sizeof($error) === 0)
            {
                if(!empty($_FILES[$fileinput]['name']))
                {
                    $currentMedia = self::$Model->GetProductById($ID);
                    $upload = MediaUpload::UploadImage($fileinput);
                    if(!$upload['err'] && self::$Model->EditProduct($title, $stock, $productType, $upload['data'],  $salesPrice, $ID))
                    {
                        if(self::$Model->DeleteMediaId($currentMedia->mediaId) &&
                            unlink(__ROOT__ . DS . 'assets' . DS . 'media' . DS . $currentMedia->filename))
                        {
                            return true;
                        }
                    } 
                    else
                    {
                        return ['err' => true, 'function' => ' kunne ikke fjerne tidligere billede på kajak. '];
                    }
                }
                else
                {
                    if(self::$Model->EditProduct($title, $stock, $productType, null,  $salesPrice, $ID))
                    {
                        return true;
                    }
                }
                return ['err' => true, 'insert' => 'Data kunne ikke sættes ind i databasen. <br> '. $upload['data']];
            }
            else
            {
                return ['err' => true, 'errors' => $error];
            }

        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function DeleteProduct(int $ID)
    {
        $currentMedia = self::$Model->GetProductById($ID);
        if(self::$Model->DeleteProduct($ID))
        {
            if(self::$Model->DeleteMediaId($currentMedia->mediaId) &&
                unlink(__ROOT__ . DS . 'assets' . DS . 'media' . DS . $currentMedia->filename))
            {
                return true;
            }
        } 
        return false;
    }
}
