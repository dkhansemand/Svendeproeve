<section id="eventsView">
    <h2>Arrangementer</h2>
    <?php
        foreach(View::CallModel()->GetCurrentEvents() as $event)
        {
    ?>
            <article>
                <img src="<?=Router::$BASE?>assets/media/<?=$event->filepath . $event->filename?>" alt="<?=$event->eventTitle?>">
                <h3><?=$event->eventTitle?></h3>
                <p><?=(new DateTime($event->eventStartDate))->format('d. F - Y')?></p>
                <p>
                    <?= htmlspecialchars_decode($event->eventDescription); ?>
                </p>
                <a href="" class="btn btn-accent">Tilmeld</a>
            </article>
    <?php
        }
    ?>
</section>