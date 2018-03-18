<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteMember($ID))
        {
            Router::Redirect('/Admin/Medlemmer');
        }
    }
?>
<div class="container">
<section id="newsView">
    <h2>Slet medlem?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Medlem/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Medlemmer')?>">Anullér</a>
    </span>
</section>
</div>