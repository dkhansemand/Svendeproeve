<section id="eventCreate">
    <h2>Opret arrangement</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="eventTitle">Titel</label>
            <input type="text" name="eventTitle" id="eventTitle" placeholder="Nyheds titel" value="<?=$POST['eventTitle'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['eventTitle']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['eventTitle']?></span>
        <?php
            }
        ?>
        <div class="text-area">
            <label for="eventDescription">Beskrivelse</label><br>
            <?php
                if(isset($return['errors']['eventDescription']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['eventDescription']?></span>
            <?php
                }
            ?>
            <textarea name="eventDescription" id="eventDescription" cols="50" rows="10"><?=$POST['eventDescription'] ?? null?></textarea>
        </div>
        <div class="input-field">
            <label for="eventStartDate">Start dato</label>
            <input type="date" name="eventStartDate" id="eventStartDate" value="<?=$POST['eventStartDate'] ?? null?>" required> *
            <?php
                if(isset($return['errors']['eventStartDate']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['eventStartDate']?></span>
            <?php
                }
            ?>
        </div>
        <div class="input-field">
            <label for="eventCover">Billede</label>
            <input type="file" name="eventCover" id="eventCover" value="<?=$POST['eventCover'] ?? null?>" required> *
            <?php
                if(isset($return['errors']['eventCover']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['eventCover']?></span>
            <?php
                }
            ?>
        </div>
        <button type="submit" name="btnEventCreate" class="btn btn-accent">Opret</button>
    </form>
</section>
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=fh6esofusmwjepd4rbl7p8z8x9w8a62ss1bc5x1clu88ei7f"></script>
<script>
document.addEventListener('DOMContentLoaded', function(e){
    tinymce.init({
      selector: 'textarea',
      height: 250
    });
});
</script>
