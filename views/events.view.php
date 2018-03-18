<?php
    $action = Router::GetParamByName('ACTION') ?? null;
    if(!is_null($action) && strtolower($action) === 'tilmeld')
    {
        $userId = (new Guard)->decoding($_SESSION['global'])->data->userId;
        $eventId = Router::GetParamByName('ID');
        if(View::CallModel()->AddSubscriber($userId, $eventId))
        {
            $success = 'Du er nu blevet tilmeldt!';
        }
    }

?>
<div class="container">
<section id="eventsView">
    <?= isset($success) ? '<h3>'.$success.'</h3>' : ''?>
    <h2>Arrangementer</h2>
    <?php
    //(new DateTime($event->eventStartDate))->format('d. F - Y')
        foreach(View::CallModel()->GetCurrentEvents() as $event)
        {
    ?>
            <article>
                <img src="<?=Router::$BASE?>assets/media/<?=$event->filepath . $event->filename?>" alt="<?=$event->eventTitle?>">
                <h3><?=$event->eventTitle?></h3>
                <p><?=ucwords(strftime('%d. %B - %Y', strtotime($event->eventStartDate)))?></p>
                <p>
                    <?= htmlspecialchars_decode($event->eventDescription); ?>
                </p>
        <?php
                if(isset($_SESSION['global']) && !empty($_SESSION['global']))
                {
                    $userId = (new Guard)->decoding($_SESSION['global'])->data->userId;
                    if(User::IsSubscribed($userId, $event->eventsId))
                    {
        ?>
                        <a href="#" class="btn btn-accent">Du er tilmeldt</a>
        <?php
                    }else{
        ?>
                        <a href="<?=Router::Link('/Arrangementer/Tilmeld/'.$event->eventsId)?>" class="btn btn-accent">Tilmeld</a>
        <?php
                    }
        ?>
        <?php
                }
        ?>
            </article>
    <?php
        }
    ?>
</section>
    </div>