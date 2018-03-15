<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteEvent($ID))
        {
            Router::Redirect('/Admin/Arrangementer');
        }
    }
?>
<section id="eventsView">
    <h2>Slet arrangementet?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Arrangement/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Arrangementer')?>">Anullér</a>
    </span>
</section>
