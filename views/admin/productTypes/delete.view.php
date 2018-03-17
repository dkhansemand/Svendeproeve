<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteType($ID))
        {
            Router::Redirect('/Admin/Baadtyper');
        }
        else
        {
            $error = 'Kunne ikke slette baadtypen. Dette kan være fordi den et en kajak tilknyttet.';
        }
    }
?>
<section id="typeView">
    <?= isset($error) ? '<h3>'.$error.'</h3>' : ''?>
    <h2>Slet bådtypen?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Baadtype/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Baadtyper')?>">Anullér</a>
    </span>
</section>
