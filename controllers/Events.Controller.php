<?php

class EventsController extends Core
{

    public function InsertEvent(array $eventData, string $fileinput, string $token)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($eventData['eventTitle']) && isset($eventData['eventDescription']) 
            && isset($eventData['eventStartDate']) && isset($_FILES[$fileinput]))
        {
            $error = [];
            $title = Validate::stringBetween($eventData['eventTitle'], 2, 45) ? $eventData['eventTitle'] : $error['eventTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $content = !empty($eventData['eventDescription']) ? $eventData['eventDescription'] : $error['eventDescription'] = 'Beskrivelse må ikke være tomt.';
            $startDate = Validate::date($eventData['eventStartDate']) ? $eventData['eventStartDate'] : $error['eventStartDate'] = 'Dato er ikke i korrekt format';
            
            if(sizeof($error) === 0)
            {
                $upload = MediaUpload::UploadImage($fileinput);
                if(!$upload['err'] && self::$Model->InsertNewEvent($title, $content, $startDate, $upload['data']))
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

    public function EditEvent(array $eventData, string $fileinput, string $token, int $ID)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($eventData['eventTitle']) && isset($eventData['eventDescription']) 
            && isset($eventData['eventStartDate']) && isset($_FILES[$fileinput]))
        {
            $error = [];
            $title = Validate::stringBetween($eventData['eventTitle'], 2, 45) ? $eventData['eventTitle'] : $error['eventTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $content = !empty($eventData['eventDescription']) ? $eventData['eventDescription'] : $error['eventDescription'] = 'Beskrivelse må ikke være tomt.';
            $startDate = Validate::date($eventData['eventStartDate']) ? $eventData['eventStartDate'] : $error['eventStartDate'] = 'Dato er ikke i korrekt format';
            
            if(sizeof($error) === 0)
            {
                if(!empty($_FILES[$fileinput]['name']))
                {
                    $upload = MediaUpload::UploadImage($fileinput);
                    if(!$upload['err'] && self::$Model->EditEvent($title, $content, $startDate, $ID, $upload['data']))
                    {
                        return true;
                    }
                }
                elseif(self::$Model->EditEvent($title, $content, $startDate, $ID))
                {
                    return true;
                }
                return ['err' => true, 'insert' => 'Data kunne ikke rettes i databasen. <br> '. ($upload['data'] ?? null)];
            }
            else
            {
                return ['err' => true, 'errors' => $error];
            }

        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function DeleteEvent(int $ID)
    {
        $mediaLocation = __ROOT__ . DS . 'assets' . DS . 'media' . DS;
        $eventData = self::$Model->GetEventById($ID);
        $mediaFile = $mediaLocation . $eventData->filepath . $eventData->filename;
        if(unlink($mediaFile) && self::$Model->DeleteEvent($ID))
        {
            return true;
        }
        return ['err' => true, 'function' => ' Kunne ikke slette arrangemnet "'.$eventData->eventTitle.'". Prøv igen.'];
    }
}
