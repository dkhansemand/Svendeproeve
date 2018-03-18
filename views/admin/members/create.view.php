<?php
    if(isset($POST['btnMemberCreate'])){
        $return = View::UseController()->InsertNewMember($POST, $POST['_once_default'], 'memberImage');
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Medlem er nu blevet oprettet';
            unset($POST);
        }
        //var_dump($POST);
    }
?>
<div class="container">
<section id="newsView">
    <h2>Opret</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="memberName">Fulde navn</label>
            <input type="text" name="memberName" id="memberName" placeholder="Fulde navn" value="<?=$POST['memberName'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['memberName']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['memberName']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="memberEmail">Email </label>
            <input type="email" name="memberEmail" id="memberEmail" placeholder="Email" value="<?=$POST['memberEmail'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['memberEmail']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['memberEmail']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="memnerPhone">Telefonummer</label>
            <input type="tel" name="memnerPhone" id="memnerPhone" placeholder="Telefonnummer (valgfrit)" value="<?=$POST['memnerPhone'] ?? null?>" > 
        </div>   
        <?php
            if(isset($return['errors']['memnerPhone']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['memnerPhone']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="memberKm">Roede KM</label>
            <input type="number" min="0" name="memberKm" id="memberKm" placeholder="Roede KM" value="<?=$POST['memberKm'] ?? '0'?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['memberKm']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['memberKm']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" value="<?=$POST['password'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['password']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['password']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="passwordRepeat">Gentag password</label>
            <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Gentag password" value="<?=$POST['passwordRepeat'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['password']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['password']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="role">Bruger rolle</label>
            <select name="role" id="role">
                <option value="0">Vælg en bruger rolle</option>
                <?php
                foreach(View::CallModel()->GetUserRoles() as $role)
                {
            ?>
                    <option value="<?=$role->roleId?>" <?= (@$POST['role'] === $role->roleId) ? 'selected' : ''?>><?=$role->roleName?></option>
            <?php
                }
            ?>
            </select>
        </div>
        <div class="input-field">
            <label for="memberImage">Billede (valgfrit)</label>
            <input type="file" name="memberImage" id="memberImage"> 
            <?php
                if(isset($return['errors']['memberImage']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['memberImage']?></span>
            <?php
                }
            ?>
        </div>
        <div class="input-field">
            <button type="submit" name="btnMemberCreate" class="btn btn-accent">Opret</button>
        </div>
    </form>
</section>
</div>