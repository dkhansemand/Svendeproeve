<?php
    if(isset($POST['btnNewsCreate'])){
        $return = View::UseController()->InsertNewsArticle($POST, $POST['_once_default']);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Nyheden er nu blevet oprettet';
            unset($POST);
        }
    }
?>
<div class="container">
<section id="newsView">
    <h2>Opret</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="newsTitle">Titel</label>
            <input type="text" name="newsTitle" id="newsTitle" placeholder="Nyheds titel" value="<?=$POST['newsTitle'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['newsTitle']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['newsTitle']?></span>
        <?php
            }
        ?>
        <div class="text-area">
            <label for="newsContent">Indhold</label><br>
            <?php
                if(isset($return['errors']['newsContent']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['newsContent']?></span>
            <?php
                }
            ?>
            <textarea name="newsContent" id="newsContent" cols="50" rows="10"><?=$POST['newsContent'] ?? null?></textarea>
        </div>
        <div class="input-field">
            <label for="newsStartDate">Start dato</label>
            <input type="date" name="newsStartDate" id="newsStartDate" value="<?=$POST['newsStartDate'] ?? null?>" required> *
            <?php
                if(isset($return['errors']['newsStartDate']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['newsStartDate']?></span>
            <?php
                }
            ?>
        </div>
        <div class="input-field">
            <label for="newsEndDate">Slut dato</label>
            <input type="date" name="newsEndDate" id="newsEndDate" value="<?=$POST['newsEndDate'] ?? null?>" required> *
            <?php
                if(isset($return['errors']['newsEndDate']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['newsEndDate']?></span>
            <?php
                }
            ?>
        </div>
        <button type="submit" name="btnNewsCreate" class="btn btn-accent">Opret</button>
    </form>
</section>
</div>
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=fh6esofusmwjepd4rbl7p8z8x9w8a62ss1bc5x1clu88ei7f"></script>
<script>
document.addEventListener('DOMContentLoaded', function(e){
    tinymce.init({
      selector: 'textarea',
      height: 250
    });
});
</script>