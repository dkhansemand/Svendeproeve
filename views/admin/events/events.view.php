<section id="eventsView">
    <h2>Arrangementer</h2>
    <a href="<?=Router::Link('/Admin/Arrangement/Opret')?>" class="btn-accent">Opret arrangement</a>
    <table class="view-table">
        <thead>
            <tr>
                <th>Arrangement</th>
                <th>Dato</th>
                <th>Tilmeldte</th>
                <th>Handlinger</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $events = View::CallModel()->GetAllEvents();
            if(sizeof($events) > 0)
            {
                foreach($events as $event)
                {    
            ?>
                <tr>
                    <td><?=$event->eventTitle?></td>
                    <td><?=$event->eventStartDate?></td>
                    <td><?=$event->eventSubs ?? 0?></td>
                    <td>
                        <a href="<?=Router::Link('/Admin/Arrangementer/Ret/'.$event->eventsId)?>">Ret</a>
                        <a href="<?=Router::Link('/Admin/Arrangementer/Slet/'.$event->eventsId)?>">Slet</a>
                    </td>
                </tr>
            <?php
                } 
            }else{
                ?>
                <tr>
                    <td>Der er ingen arrangementer at vise</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>