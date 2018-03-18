<?php
    if(isset($POST['btnSubmit']))
    {
        $return = View::UseController()->SubmitMessage($POST, $POST['_once_default']);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Beskeden er nu modtaget.';
            unset($POST);
        }
    }
?>
<div class="container">
    <section id="contactView">
        <h2>Kontakt</h2>
        <p>Skriv til os, hvis du har spørgsmål eller andet på hjerte :)</p>
        <form action="" method="post">
            <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
            <?=Token::createTokenInput()?>
            <div class="input-field">
                <input type="text" name="name" placeholder="Navn" value="<?=$POST['name'] ?? null?>" required>
            </div>
            <?php
                if(isset($return['errors']['name']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['name']?></span>
            <?php
                }
            ?>
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" value="<?=$POST['email'] ?? null?>" required>
            </div>
            <?php
                if(isset($return['errors']['email']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['email']?></span>
            <?php
                }
            ?>
            <div class="input-field">
                <input type="tel" name="phone" placeholder="Telefonnummer (valgfrit)" value="<?=$POST['phone'] ?? null?>">
            </div>
            <?php
                if(isset($return['errors']['phone']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['phone']?></span>
            <?php
                }
            ?>
            <div class="input-textarea">
                <textarea name="message" rows="10" placeholder="Besked"><?=$POST['message'] ?? null?></textarea>
            </div>
            <?php
                if(isset($return['errors']['message']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['message']?></span>
            <?php
                }
            ?>
            <button name="btnSubmit">Send besked</button>
        </form>
    </section>
</div>
<div id="mapKontakt"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZIuNDiCXLNPaZ6XQzyalv6IkSdiWOb_A&callback=initMapKontakt" async></script>
<script src="<?=Router::$BASE?>assets/js/maps.js"></script>
