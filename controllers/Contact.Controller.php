<?php

class ContactController extends Core
{
    
   public function SubmitMessage(array $messageData, string $token)
   {
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Send besked"'];
        }
        if(isset($messageData['name']) && isset($messageData['email']) 
            && isset($messageData['message']))
        {
            $error = [];
            $name = Validate::characters($messageData['name'], 2, 45) ? $messageData['name'] : $error['name'] = 'Navn skal udfyldes og kun være bogstaver';
            $email = Validate::email($messageData['email']) ? $messageData['email'] : $error['email'] = 'Email er ikke i korrekt format';
            $message = !empty($messageData['message']) ? strip_tags($messageData['message']) : $error['message'] = 'Besked skal være udfyldt.';
            $phone = !empty($messageData['phone']) ? (Validate::phone($messageData['phone']) ? $messageData['phone'] : $error['phone'] = 'Telefonnummer er ikke i korrekt format') : null;
           

            if(sizeof($error) === 0)
            {
                if(self::$Model->SubmitMessage($name, $email, $phone, $message))
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
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Send besked"'];
   }

}
