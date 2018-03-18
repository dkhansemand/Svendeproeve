<?php
    $ID = (int)Router::GetParamByName('ID');
    if(isset($POST['btnTypeEdit'])){
        $return = View::UseController()->EditProductType($POST, $POST['_once_default'], $ID);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Bådtypen er nu blevet Rettet';
            unset($POST);
        }
    }

    $typeData = View::CallModel()->GetTypeById($ID);
?>
<section id="typeView">
    <h2>Ret</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="productTypeName">Bådtype navn</label>
            <input type="text" name="productTypeName" id="productTypeName" placeholder="Type navn" value="<?=$POST['productTypeName'] ?? $typeData->kajakTypeName ?? null?>" required> *
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
            <input type="number" min="1" max="11" name="typeLevel" id="typeLevel" value="<?=$POST['typeLevel'] ?? $typeData->kajakTypeLevel ?? null?>" required> *
            <?php
                if(isset($return['errors']['typeLevel']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['typeLevel']?></span>
            <?php
                }
            ?>
        </div>
        <button type="submit" name="btnTypeEdit" class="btn btn-accent">Ret</button>
    </form>
</section>
