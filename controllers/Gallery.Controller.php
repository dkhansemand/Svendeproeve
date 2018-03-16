<?php

class GalleryController extends Core
{
    
    public function CreateNewGallery(array $galleryData, string $fileinput, string $token)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($galleryData['albumTitle']) && isset($galleryData['images']) 
            && isset($galleryData['albumCover']) && isset($_FILES[$fileinput]))
        {
            $error = [];
            $title = Validate::stringBetween($galleryData['albumTitle'], 2, 45) ? $galleryData['albumTitle'] : $error['albumTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $event = $galleryData['event'] != 0 ? $galleryData['event'] : null;
            $albumCover = !empty($galleryData['albumCover']) ? $galleryData['albumCover'] : $error['albumCover'] = 'Der skal være valgt et frontbillede';
            
            if(sizeof($error) === 0)
            {
                foreach($_FILES['images']['name'] as $idx => $inmage)
                {
                    if(!in_array($inmage, $galleryData['images']))
                    {
                        unset($_FILES['images']['name'][$idx],$_FILES['images']['type'][$idx],$_FILES['images']['tmp_name'][$idx], $_FILES['images']['error'][$idx],$_FILES['images']['size'][$idx]);
                    }
                }
                $subfolder = str_replace(' ', '-', $title);
                $upload = MediaUpload::UploadMultipleImages($fileinput, $subfolder, ['1200x800', '200x150']);
                $mediaIds = [];
                foreach($upload['data'] as $images)
                {
                    $mediaIds[] = $images[0];
                    if(in_array($albumCover, $images))
                    {
                        $albumCoverId = $images[0];
                    }
                }
                if(!$upload['err'] && self::$Model->InsertNewGallery($title, $event, $albumCoverId, $mediaIds))
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

    public function EditGallery(array $galleryData, string $fileinput, string $token, int $ID)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($galleryData['albumTitle']) && isset($galleryData['images']) 
            && isset($galleryData['albumCover']))
        {
            $error = [];
            $title = Validate::stringBetween($galleryData['albumTitle'], 2, 45) ? $galleryData['albumTitle'] : $error['albumTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $event = $galleryData['event'] != 0 ? $galleryData['event'] : null;
            $albumCover = !empty($galleryData['albumCover']) ? (int)$galleryData['albumCover'] : $error['albumCover'] = 'Der skal være valgt et frontbillede';

            if(sizeof($error) === 0)
            {
                if(!empty($_FILES[$fileinput]['name'][0]))
                {
                    foreach($_FILES[$fileinput]['name'] as $idx => $inmage)
                    {
                        if(!in_array($inmage, $galleryData['images']))
                        {
                            unset($_FILES[$fileinput]['name'][$idx],$_FILES[$fileinput]['type'][$idx],$_FILES[$fileinput]['tmp_name'][$idx], $_FILES['images']['error'][$idx],$_FILES['images']['size'][$idx]);
                        }
                    }
                    $subfolder = str_replace(' ', '-', $title);
                    $upload = MediaUpload::UploadMultipleImages($fileinput, $subfolder, ['1200x800', '200x150']);
                    $mediaIds = [];
                    foreach($upload['data'] as $images)
                    {
                        $mediaIds[] = $images[0];
                        if(in_array($albumCover, $images))
                        {
                            $albumCoverId = $images[0];
                        }
                    }
                    if(!$upload['err'] && self::$Model->EditGallery($title, $event, $albumCoverId, $mediaIds, $ID))
                    {
                        return true;
                    }
                    return ['err' => true, 'insert' => 'Data kunne ikke sættes ind i databasen. <br> '. $upload['data']];
                }
                else
                {
                    return self::$Model->EditGallery($title, $event, $albumCover,[], $ID);
                }
            }
            else
            {
                return ['err' => true, 'errors' => $error];
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }
}
