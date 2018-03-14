<?php

class NewsController extends Core
{
    public function __construct()
    {
        
    }

    public function InsertNewsArticle(array $newsData, string $token)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($newsData['newsTitle']) && isset($newsData['newsContent'])
            && isset($newsData['newsStartDate']) && $newsData['newsEndDate'])
        {
            $error = [];
            $title = Validate::stringBetween($newsData['newsTitle'], 2, 45) ? $newsData['newsTitle'] : $error['newsTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $content = !empty($newsData['newsContent']) ? $newsData['newsContent'] : $error['newsContent'] = 'Indhold må ikke være tomt.';
            $startDate = Validate::date($newsData['newsStartDate']) ? $newsData['newsStartDate'] : $error['newsStartDate'] = 'Dato er ikke i korrekt format';
            $endDate = Validate::date($newsData['newsEndDate']) ? $newsData['newsEndDate'] : $error['newsEndDate'] = 'Dato er ikke i korrekt format';

            if(sizeof($error) === 0)
            {
                if(self::$Model->InsertArticle($title, $content, $startDate, $endDate))
                {
                    return true;
                }
                return ['err' => true, 'insert' => 'Data kunne ikke sættes ind i databasen.'];
            }else{
                return ['err' => true, 'errors' => $error];
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function EditNewsArticle(array $newsData, string $token, int $ID)
    {
        if(!Token::validateToken($token)){
            return ['err' => true, 'token' => ' Korrupt data. Prøv igen ved at klikke på "Opret"'];
        }
        if(isset($newsData['newsTitle']) && isset($newsData['newsContent'])
            && isset($newsData['newsStartDate']) && $newsData['newsEndDate'])
        {
            $error = [];
            $title = Validate::stringBetween($newsData['newsTitle'], 2, 45) ? $newsData['newsTitle'] : $error['newsTitle'] = 'Titlen må kun inholde bogstaver og tal. Samt være mellem 2 og 45 tegn';
            $content = !empty($newsData['newsContent']) ? $newsData['newsContent'] : $error['newsContent'] = 'Indhold må ikke være tomt.';
            $startDate = Validate::date($newsData['newsStartDate']) ? $newsData['newsStartDate'] : $error['newsStartDate'] = 'Dato er ikke i korrekt format';
            $endDate = Validate::date($newsData['newsEndDate']) ? $newsData['newsEndDate'] : $error['newsEndDate'] = 'Dato er ikke i korrekt format';

            if(sizeof($error) === 0)
            {
                if(self::$Model->EditArticle($title, $content, $startDate, $endDate, $ID))
                {
                    return true;
                }
                return ['err' => true, 'insert' => 'Data kunne ikke rettes i databasen.'];
            }else{
                return ['err' => true, 'errors' => $error];
            }
        }
        return ['err' => true, 'function' => ' data blev ikke modtaget til server. Prøv igen ved at klikke på "Opret"'];
    }

    public function DeleteNewsArticle(int $ID)
    {
        return self::$Model->DeleteArticle($ID);
    }
}
