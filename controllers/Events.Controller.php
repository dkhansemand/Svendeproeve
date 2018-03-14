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

        }
    }
}
