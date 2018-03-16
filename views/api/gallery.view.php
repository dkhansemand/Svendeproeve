<?php

if(!empty($POST))
{
    if(!empty($POST['mediaId']) && is_numeric($POST['mediaId']))
    {
        $path = __ROOT__ . DS . 'assets' . DS . 'media' . DS;
        $mediaInfo = View::CallModel()->GetMediaInfoById($POST['mediaId']);
        $filenameSplit = explode('_', $mediaInfo->filename);
        $fullsize = View::CallModel()->GetMediaInfoByFilename($filenameSplit[2]);
        if(unlink($path.$mediaInfo->filepath.DS.$mediaInfo->filename) && unlink($path.$fullsize->filepath.DS.$fullsize->filename) )
        {
            if(View::CallModel()->DeleteMediaId($mediaInfo->mediaId) && View::CallModel()->DeleteMediaId($fullsize->mediaId))
            {
                echo json_encode(['err' => false, 'media' => $fullsize]);
            }
        }
        else
        {
            echo json_encode(['err' => true, 'msg' => 'Kunne ikke slette billede [SQL-fejl]' . $POST['mediaId']]);
        }
    }
    else
    {
        echo json_encode(['err' => true, 'msg' => 'Kunne ikke slette billede ' . $POST['mediaId']]);
    }
}else{
    echo json_encode(['err' => true, 'msg' => 'Fejl filer blev ikke modtaget.']);
}

