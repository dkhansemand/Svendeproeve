<?php

class MediaUpload extends Database
{
    private static $error = array(
        0 => '',
        1 => 'Filens størrelse overskrider \'upload_max_filesize\' directivet i php.ini.',
        2 => 'Filen størrelse overskride \'MAX_FILE_SIZE\' directivet i HTML formen.',
        3 => 'File blev kun delvis uploadet.',
        4 => 'Filen blev ikke uploaded.',
        6 => 'Kunne ikke finde \'tmp\' mappen.',
        7 => 'Kunne ikke gemme filen på disken.',
        8 => 'A PHP extension stopped the file upload.',
        9 => 'Filtypen er ikke tilladt at uploade!'
    );
    private static $mimeType = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    private static $uploadFolder = __ROOT__ . DS . 'assets' . DS . 'media' . DS;

    public static function UploadImage(string $inputName, string $subfolder = '', array $sizes = [])
    {
        !empty($subfolder) ? self::$uploadFolder .= $subfolder . DS : null;
        if(array_key_exists($inputName, $_FILES)){
            if($_FILES[$inputName]['error'] === 0 && $_FILES[$inputName]['size'] > 0){
                $file = $_FILES[$inputName];
                $imageData = getimagesize($file['tmp_name']);
               
                if(!in_array($imageData['mime'], self::$mimeType)){
                    return [
                        'err' => true,
                        'data' => 'Filtypen er ikke tilladt.'
                    ];
                }
        
                if(!file_exists(self::$uploadFolder)){
                    mkdir(self::$uploadFolder, 0755, true);
                }
        
                $fileName = time() . '_' . substr(hash('sha256', $file['name']), 0, -15);
                $fileName = str_replace(' ', '', $fileName) . str_replace('image/', '.', $imageData['mime']);
                if(sizeof($sizes) > 0){
                    $mediaIds = [];
                    if(move_uploaded_file($file['tmp_name'], self::$uploadFolder . $fileName)){
                    foreach($sizes as $size)
                    {
                        if(strpos($size, 'x') !== false){
                            $newSize = explode('x', $size);
                            
                                if(MediaResizer::Generate(self::$uploadFolder . $fileName, self::$uploadFolder . $size .'_'. $fileName, $newSize[0], $newSize[1])){
                                    (new self)->query("INSERT INTO media (`filename`, `filepath`, `mime`)VALUES(:FNAME, :FPATH, :FTYPE);", 
                                                            [
                                                                ":FNAME" =>  $size .'_' . $fileName,
                                                                ":FPATH" => $subfolder,
                                                                ":FTYPE" => $imageData['mime']
                                                            ]);
                                    $mediaId = (new self)->query("SELECT mediaId FROM media WHERE `filename` = :FNAME;", [':FNAME' => $size.'_' . $fileName])->fetch()->mediaId;
                                    array_push($mediaIds, $mediaId);
                                }
                            }
                        }
                        unlink(self::$uploadFolder . $fileName);
                    }
                    return ['err' => false, 'data' => $mediaIds];
                }else{
                    try
                    {
                        if(move_uploaded_file($file['tmp_name'], self::$uploadFolder . $fileName)){
                            (new self)->query("INSERT INTO media (`filename`, `filepath`, `mime`)VALUES(:FNAME, :FPATH, :FTYPE);", 
                            [
                                ":FNAME" => $fileName,
                                ":FPATH" => $subfolder,
                                ":FTYPE" => $imageData['mime']
                            ]);
                            $media = (new self)->query("SELECT mediaId FROM media WHERE `filename` = :FNAME;", [':FNAME' => $fileName])->fetch();
                            return ['err' => false, 'data' => $media->mediaId];
                        }
                    }catch(Exception $err)
                    {
                        unlink(self::$uploadFolder.$fileName);
                        return ['err' => true, 'data' => 'Fejl! ' . $err->getMessage()]; 
                    }
                }
    
            }else{
                return [
                    'err' => true,
                    'data' => 'Filen ' . $_FILES[$inputName]['name'] . ' kunne ikke uploades til serveren! Fejlkode ' . $_FILES[$inputName]['error'] . ' - ' . self::$error[$_FILES[$inputName]['error']]
                ];
            }
            return ['err' => true, 'data' => 'Ingen filer sendt med! $_FILES er tomt'];
        }
    }

    public static function UploadMultipleImages(string $inputName, string $subfolder, array $sizes = [])
    {
        if(array_key_exists($inputName, $_FILES) && sizeof($_FILES[$inputName]['name']) > 0)
        {
            $mediaIds = [];
            !empty($subfolder) ? self::$uploadFolder .= $subfolder . DS : null;
            if(!file_exists(self::$uploadFolder))
            {
                mkdir(self::$uploadFolder, 0755, true);
            }
            for($i = 0; $i < sizeof($_FILES[$inputName]['name']); $i++)
            {
                if($_FILES[$inputName]['error'][$i] === 0 && $_FILES[$inputName]['size'][$i] > 0)
                {
                    $file = $_FILES[$inputName];
                    $imageData = getimagesize($file['tmp_name'][$i]);
                
                    if(!in_array($imageData['mime'], self::$mimeType))
                    {
                        return [
                            'err' => true,
                            'data' => 'Filtypen er ikke tilladt.'
                        ];
                    }
                        
                    $fileName = time() . '_' . substr(hash('sha256', $file['name'][$i]), 0, -15);
                    $fileName = str_replace(' ', '', $fileName) . str_replace('image/', '.', $imageData['mime']);
                    if(sizeof($sizes) > 0){
                        
                        if(move_uploaded_file($file['tmp_name'][$i], self::$uploadFolder . $fileName)){
                        foreach($sizes as $size)
                        {
                            if(strpos($size, 'x') !== false){
                                $newSize = explode('x', $size);
                                
                                    if(MediaResizer::Generate(self::$uploadFolder . $fileName, self::$uploadFolder . $size .'_'. $fileName, $newSize[0], $newSize[1])){
                                        (new self)->query("INSERT INTO media (`filename`, `filepath`, `mime`)VALUES(:FNAME, :FPATH, :FTYPE);", 
                                                                [
                                                                    ":FNAME" =>  $size .'_' . $fileName,
                                                                    ":FPATH" => $subfolder,
                                                                    ":FTYPE" => $imageData['mime']
                                                                ]);
                                        $mediaId = (new self)->query("SELECT mediaId FROM media WHERE `filename` = :FNAME;", [':FNAME' => $size.'_' . $fileName])->fetch()->mediaId;
                                        array_push($mediaIds, [$mediaId, $file['name'][$i]]);
                                    }
                                }
                            }
                            unlink(self::$uploadFolder . $fileName);
                        }
                       // return ['err' => false, 'data' => $mediaIds];
                    }else{
                        try
                        {
                            if(move_uploaded_file($file['tmp_name'][$i], self::$uploadFolder . $fileName)){
                                (new self)->query("INSERT INTO media (`filename`, `filepath`, `mime`)VALUES(:FNAME, :FPATH, :FTYPE);", 
                                [
                                    ":FNAME" => $fileName,
                                    ":FPATH" => $subfolder,
                                    ":FTYPE" => $imageData['mime']
                                ]);
                                $media = (new self)->query("SELECT mediaId FROM media WHERE `filename` = :FNAME;", [':FNAME' => $fileName])->fetch();
                                array_push($mediaIds, [$mediaId, $file['name'][$i]]);
                                //return ['err' => false, 'data' => $media->mediaId];
                            }
                        }catch(Exception $err)
                        {
                            unlink(self::$uploadFolder.$fileName);
                            //return ['err' => true, 'data' => 'Fejl! ' . $err->getMessage()]; 
                        }
                    }
                }                
            }
            return ['err' => false, 'data' => $mediaIds];
        }
        return ['err' => true, 'data' => 'Ingen filer sendt med! $_FILES er tomt'];
    }
    
}
