<?php
    $ID = (int)Router::GetParamByName('ID');
    if(isset($POST['btnProductEdit'])){
        $return = View::UseController()->EditProduct($POST, 'productImage', $POST['_once_default'], $ID);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Kajakken er nu blevet rettet';
            unset($POST);
        }
    }
    $productData = View::CallModel()->GetProductById($ID);
?>
<div class="container">
<section id="productView">
    <h2>Ret kajak</h2>
    <?= isset($success) ? '<p>'.$success.'</p>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?=Token::createTokenInput();?>
        <small>Felter med <em>* </em> skal udfyldes</small>
        <div class="input-field">
            <label for="productName">Kajaknavn *</label>
            <input type="text" name="productName" id="productName" placeholder="Kajaknavn" value="<?=$POST['productName'] ?? $productData->kajakName ??null?>" required> 
        </div>   
        <?php
            if(isset($return['errors']['productName']))
            {
        ?>
                <span class="err-msg">Fejl - <?=$return['errors']['productName']?></span>
        <?php
            }
        ?>
        <div class="input-field">
            <label for="productStock">Antal *</label>
            <input type="number" min="0" name="productStock" id="productStock" value="<?=$POST['productStock'] ?? $productData->kajakStock ?? null?>" required> 
            <?php
                if(isset($return['errors']['productStock']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['productStock']?></span>
            <?php
                }
            ?>
        </div>
        <div class="input-field">
            <label for="productType">Kajaktype *</label>
            <select name="productType" id="productType" required>
                <option value="0">Vælg en type</option>
                <?php
                foreach(View::CallModel()->GetAllTypes() as $type)
                {
            ?>
                    <option value="<?=$type->kajakTypeId?>" <?= (@$POST['productType'] ?? $productData->kajakTypeId  === $type->kajakTypeId) ? 'selected' : ''?>><?=$type->kajakTypeName?></option>
            <?php
                }
            ?>
            </select>
            </div>   
            <?php
                if(isset($return['errors']['productType']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['productType']?></span>
            <?php
                }
            ?>
              <div class="input-field">
            <label for="productPrice">Salgs pris (valgfrit)</label>
            <input type="text" name="productPrice" id="productPrice" value="<?=$POST['productPrice'] ?? $productData->salesPrice ?? null?>"> 
            <?php
                if(isset($return['errors']['productPrice']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['productPrice']?></span>
            <?php
                }
            ?>
        </div>
        <div class="input-field">
            <label for="productImage">Skift Billede * </label>
            <input type="file" name="productImage" id="productImage" value="<?=$POST['productImage'] ?? null?>"> 
            <?php
                if(isset($return['errors']['productImage']))
                {
            ?>
                    <br><span class="err-msg">Fejl - <?=$return['errors']['eventCover']?></span>
            <?php
                }
            ?>
        </div>
        <button type="submit" name="btnProductEdit" class="btn btn-accent">Ret</button>
    </form>
</section>
</div>