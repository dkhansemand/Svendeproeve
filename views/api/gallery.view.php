<?php
//sleep(1);
if(!empty($_FILES['gallery']['name']))
{
    $fileContent = file_get_contents($_FILES['gallery']['tmp_name']);
    $base64 = base64_encode($fileContent);
    echo json_encode(['err' => false, 'base' => $base64, 'filename' => $_FILES['gallery']['name'], 'mime' => $_FILES['gallery']['type'], 'ID' => microtime()]);
}else{
    echo json_encode(['err' => true, 'msg' => 'Fejl filer blev ikke modtaget.']);
}

