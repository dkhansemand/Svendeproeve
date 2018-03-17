<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteProduct($ID))
        {
            Router::Redirect('/Admin/Baadpark');
        }
    }
?>
<section id="eventsView">
    <h2>Slet kajak?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Baadpark/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Baadpark')?>">Anullér</a>
    </span>
</section>
