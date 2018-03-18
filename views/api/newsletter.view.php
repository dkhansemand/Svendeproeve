<?php

if(!empty($POST))
{
    if(!empty($POST['email']))
    {
        if(Validate::email($POST['email']))
        {
            if(View::CallModel()->AddSubscriber($POST['email']))
            {
                echo json_encode(['err' => false, 'msg' => 'Du er nu tilmeldt nyhedsbrev']);
            }
            else
            {
                echo json_encode(['err' => true, 'msg' => 'Email er ellerede tilmeldt']);
            }
        }
        else
        {
            echo json_encode(['err' => true, 'msg' => 'Email er ikke i korrekt format']);
        }
    }
    else
    {
        echo json_encode(['err' => true, 'msg' => 'Email skal være udfyldt']);
    }
}else{
    echo json_encode(['err' => true, 'msg' => 'Fejl data blev ikke modtaget.']);
}

