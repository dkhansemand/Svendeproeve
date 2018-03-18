<?php

class MembersController extends Core
{
    
   public function InsertNewMember(array $memberData, string $token, string $fileinput)
   {
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }

        if(isset($memberData['memberName']) && isset($memberData['memberEmail'])
            && isset($memberData['memberKm']) && isset($memberData['password']) 
            && isset($memberData['passwordRepeat']) && isset($memberData['role'])) 
        {
            $error = [];
            $name = Validate::stringBetween($memberData['memberName'], 2, 45) ? $memberData['memberName'] : $error['memberName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $email = Validate::email($memberData['memberEmail']) ? $memberData['memberEmail'] : $error['memberEmail'] = 'Email er ikke i korrekt format';
            $memberKm = Validate::intBetween((int)$memberData['memberKm'], 1, 99999) ? (int)$memberData['memberKm'] : $error['memberKm'] = 'Roede kilometer skal være angivet og minst være 0';
            $role = !empty($memberData['role']) && $memberData['role'] != 0 ? $memberData['role'] : $error['role'] = 'Bruger rolle skal vælges!';
            $password = Validate::match($memberData['password'], $memberData['passwordRepeat']) ? $memberData['password'] : $error['password'] = 'Password skal udfyldes og være ens i begge felter.';
            $phone = !empty($memberData['memberPhone']) ? (Validate::phone($memberData['memberPhone']) ? $memberData['memberPhone'] : $error['memberPhone'] = 'Telefonnummer er ikke i korrekt format') : null;


            if(sizeof($error) === 0)
            {
                $password = password_hash($password, PASSWORD_BCRYPT);
                if(!empty($_FILES[$fileinput]['name']))
                {
                    $upload = MediaUpload::UploadImage($fileinput);
                    if(!$upload['err'] && self::$Model->InsertNewMember($name, $email, $memberKm, $role, $password, $phone, $upload['data']))
                    {
                        return true;
                    }
                }
                else
                {
                    if(self::$Model->InsertNewMember($name, $email, $memberKm, $role, $password, $phone))
                    {
                        return true;
                    }
                    else
                    {
                        return ['err' => true, 'function' => 'Medlem eksistere allerede'];
                    }
                }
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
   }

   public function EditMember(array $memberData, string $token, string $fileinput, int $ID)
   {
        if(isset($token) && !Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }

        if(isset($memberData['memberName']) && isset($memberData['memberEmail'])
            && isset($memberData['role'])) 
        {
            $error = [];
            $password = null;
            $name = Validate::stringBetween($memberData['memberName'], 2, 45) ? $memberData['memberName'] : $error['memberName'] = 'Navnet må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $email = Validate::email($memberData['memberEmail']) ? $memberData['memberEmail'] : $error['memberEmail'] = 'Email er ikke i korrekt format';
            $role = !empty($memberData['role']) && $memberData['role'] != 0 ? $memberData['role'] : $error['role'] = 'Bruger rolle skal vælges!';
            $phone = !empty($memberData['memberPhone']) ? (Validate::phone($memberData['memberPhone']) ? $memberData['memberPhone'] : $error['memberPhone'] = 'Telefonnummer er ikke i korrekt format') : null;
            $memberKm = Validate::intBetween((int)$memberData['memberKm'], 1, 99999) ? (int)$memberData['memberKm'] : $error['memberKm'] = 'Roede kilometer skal være angivet og minst være 0';
            
            if(!empty($memberData['memberKm']) && $memberData['memberKm'] != 0 && isset($memberData['memberCurrentKm']))
            {
                $memberKm += (int)$memberData['memberCurrentKm'];
            }else{
                $memberKm = (int)$memberData['memberCurrentKm'];
            }

            if(!empty($memberData['password']) && !empty($memberData['passwordRepeat']))
            {
                $password = Validate::match($memberData['password'], $memberData['passwordRepeat']) ? $memberData['password'] : $error['password'] = 'Password skal udfyldes og være ens i begge felter.';
                $password = password_hash($password, PASSWORD_BCRYPT);
            }
            
            if(sizeof($error) === 0)
            {
                if(!empty($_FILES[$fileinput]['name']))
                {
                    $upload = MediaUpload::UploadImage($fileinput);
                    if(!$upload['err'] && self::$Model->EditMember($ID, $name, $email, $memberKm, $role, $password, $phone, $upload['data']))
                    {
                        return true;
                    }
                }
                else
                {
                    if(self::$Model->EditMember($ID, $name, $email, $memberKm, $role, $password, $phone))
                    {
                        return true;
                    }
                    else
                    {
                        return ['err' => true, 'function' => 'Medlem eksistere allerede'];
                    }
                }
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
   }

   public function DeleteMember($ID)
   {
       return self::$Model->DeleteMember($ID);
   }

}
