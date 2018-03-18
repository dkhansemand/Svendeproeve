<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteMessage($ID))
        {
            Router::Redirect('/Admin/Beskeder');
        }
    }
?>
<div class="container">
<section id="newsView">
    <h2>Slet beskeden?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Besked/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Beskeder')?>">Anullér</a>
    </span>
</section>
</div>