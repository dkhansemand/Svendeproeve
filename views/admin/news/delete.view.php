<?php
    if(isset($GET['DELETE']))
    {
        $ID = (int)Router::GetParamByName('ID');
        if(View::UseController()->DeleteNewsArticle($ID))
        {
            Router::Redirect('/Admin/Nyheder');
        }
    }
?>
<section id="newsView">
    <h2>Slet Nyheden?</h2>
    <span class="delete-buttons">
        <a class="btn btn-success" href="<?=Router::Link('/Admin/Nyheder/Slet/'.Router::GetParamByName('ID').'?DELETE')?>">Ja</a>
        <a class="btn btn-error" href="<?=Router::Link('/Admin/Nyheder')?>">Anullér</a>
    </span>
</section>
