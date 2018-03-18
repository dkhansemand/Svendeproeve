<?php
    $results = View::CallModel()->FreeSearch($POST['searchQuery']);
?>
<div class="container">
    <h2>Søgning</h2>
    <section id="searchView">
    <?php
    if(sizeof($results[0]) > 0 || sizeof($results[1]) > 0)
    {

        foreach($results as $result)
        {
            foreach($result as $data)
            {
                if(isset($data->newsId))
                {
    ?>
                    <article>
                        <h3>Nyhed</h3>
                        <p><?=$data->newsTitle?></p>
                        <p><?=ucwords(strftime('%d. %B - %Y', strtotime($data->newsStartDate)))?></p>
                        <p>
                        <?=(strlen($data->newsContent) > 100) ? substr($data->newsContent, 0, 100) . ' ...' : htmlspecialchars_decode($data->newsContent) ?>
                        </p>
                        <a href="<?=Router::Link('/Nyhed/'.str_replace(' ', '-', $data->newsTitle).'-'.$data->newsId)?>" class="btn-accent">Læs mere</a>
                    </article>
    <?php
                }
                elseif(isset($data->eventsId))
                {
    ?>
                    <article>
                        <h3>Arrangement</h3>
                        <img src="<?=Router::$BASE?>assets/media/<?=$data->filename?>" alt="">
                        <p><?=$data->eventTitle?></p>
                        <p><?=ucwords(strftime('%d. %B - %Y', strtotime($data->eventStartDate)))?></p>
                        <p>
                            <?=(strlen($data->eventDescription) > 100) ? substr($data->eventDescription, 0, 100) . ' ...' : htmlspecialchars_decode($data->eventDescription) ?>
                        </p>
                        <?php
                            if(isset($_SESSION['global']) && !empty($_SESSION['global']))
                            {
                                $userId = (new Guard)->decoding($_SESSION['global'])->data->userId;
                                if(User::IsSubscribed($userId, $data->eventsId))
                                {
                        ?>
                                        <p>Du er tilmeldt</p>
                        <?php
                                    }else{
                        ?>
                                        <a href="<?=Router::Link('/Arrangementer')?>" class="btn btn-event">Læs mere</a>
                        <?php
                                    }
                        ?>
                        <?php
                                }
                        ?>
                    </article>
    <?php
                }
            }
        }
    }
    else
    {
?>
    <h4>Din søgning returnerede ingen nyheder eller arrangemnter prøv at omformulere søgningen</h4>
<?php
    }
    ?>
    </section> 
</div>