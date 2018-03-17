<?php
    if(isset($POST['btnEventCreate'])){
        $return = View::UseController()->InsertEvent($POST, 'eventCover', $POST['_once_default']);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Arrangemntet er nu blevet oprettet';
            unset($POST);
        }
    }
?>
<section id="eventView">
    <h2>Opret ny båd</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="eventTitle">Titel</label>
            <input type="text" name="eventTitle" id="eventTitle" placeholder="Arrangenment titel" value="<?=$POST['eventTitle'] ?? null?>" required> *
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
        <button type="submit" name="btnProductCreate" class="btn btn-accent">Opret</button>
    </form>
</section>
