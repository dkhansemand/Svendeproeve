<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteGallery($ID))
        {
            Router::Redirect('/Admin/Galleri');
        }
    }
?>
<section id="newsView">
    <h2>Slet galleriet?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Galleri/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Galleri')?>">Anullér</a>
    </span>
</section>
