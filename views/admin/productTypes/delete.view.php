<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteType($ID))
        {
            Router::Redirect('/Admin/Kajaktyper');
        }
        else
        {
            $error = 'Kunne ikke slette Kajaktypen. Dette kan være fordi den et en kajak tilknyttet.';
        }
    }
?>
<div class="container">
<section id="typeView">
    <?= isset($error) ? '<h3>'.$error.'</h3>' : ''?>
    <h2>Slet kajaktypen?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Kajaktype/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Kajaktype')?>">Anullér</a>
    </span>
</section>
</div>