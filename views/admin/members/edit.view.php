<?php
    $ID = (int)Router::GetParamByName('ID');
    if(isset($POST['btnMemberEdit'])){
        $return = View::UseController()->EditMember($POST, $POST['_once_default'], 'memberImage', $ID);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Medlem er nu blevet rettet';
            unset($POST);
        }
        //var_dump($POST);
    }
    $userData = View::CallModel()->GetUserInfo($ID);
?>
<div class="container">
<section id="newsView">
    <h2>Ret</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="memberName">Fulde navn</label>
            <input type="text" name="memberName" id="memberName" placeholder="Fulde navn" value="<?=$POST['memberName'] ?? $userData->fullname ?? null?>" required> *
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
            <input type="email" name="memberEmail" id="memberEmail" placeholder="Email" value="<?=$POST['memberEmail'] ?? $userData->userEmail ?? null?>" required> *
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
            <label for="memberPhone">Telefonummer</label>
            <input type="tel" name="memberPhone" id="memberPhone" placeholder="Telefonnummer (valgfrit)" value="<?=$POST['memberPhone'] ?? $userData->userPhone ??null?>" > 
        </div>   
        <?php
            if(isset($return['errors']['memberPhone']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['memberPhone']?></span>
        <?php
            }
        ?>
            <span>
            Nuværende KM roet: <?= $userData->userKm ?? '0'?>
            </span>
        <div class="input-field">
            <label for="memberKm">Tilføj flere KM</label>
            <input type="number" min="0" name="memberKm" id="memberKm" placeholder="Roede KM" value="<?=$POST['memberKm'] ?? '0'?>"> 
            <input type="hidden" name="memberCurrentKm" value="<?= $userData->userKm ?? '0'?>" >
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
            <input type="password" name="password" id="password" placeholder="Password" value="<?=$POST['password'] ?? null?>"> 
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
            <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Gentag password" value="<?=$POST['passwordRepeat'] ?? null?>"> 
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
                    <option value="<?=$role->roleId?>" <?= ($POST['role'] ?? $userData->userRole === $role->roleId) ? 'selected' : ''?>><?=$role->roleName?></option>
            <?php
                }
            ?>
            </select>
        </div>
        <div class="input-field">
            <label for="memberImage">Skift billede </label>
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
            <button type="submit" name="btnMemberEdit" class="btn btn-accent">Ret</button>
        </div>
    </form>
</section>
</div>