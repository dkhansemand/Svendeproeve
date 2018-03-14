<?php

class EventsController extends Core
{
    public function __construct()
    {
        
    }

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
                $upload = MediaUpload::UploadImage('eventCover');
                if(!$upload['err'] && self::$Model->InsertNewEvent($title, $content, $startDate, $upload['data']))
                {
                    return true;
                }
                return ['err' => true, 'insert' => 'Data kunne ikke sættes ind i databasen.'];
            }
            else
            {
                return ['err' => true, 'errors' => $error];
            }

        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }
}
