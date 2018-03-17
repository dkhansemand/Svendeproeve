<?php
    if(isset($POST['btnTypeCreate'])){
        $return = View::UseController()->CreateProductType($POST, $POST['_once_default']);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Bådtypen er nu blevet oprettet';
            unset($POST);
        }
    }
?>
<section id="typeView">
    <h2>Opret</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="productTypeName">Bådtype navn</label>
            <input type="text" name="productTypeName" id="productTypeName" placeholder="Type navn" value="<?=$POST['productTypeName'] ?? null?>" required> *
        </div>   
        <?php
            if(isset($return['errors']['productTypeName']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['productTypeName']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="typeLevel">Sværhedsgrad</label>
            <input type="number" min="0" name="typeLevel" id="typeLevel" value="<?=$POST['typeLevel'] ?? null?>" required> *
            <?php
                if(isset($return['errors']['typeLevel']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['typeLevel']?></span>
            <?php
                }
            ?>
        </div>
        <button type="submit" name="btnTypeCreate" class="btn btn-accent">Opret</button>
    </form>
</section>
