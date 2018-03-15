<section id="galleryView">
    <h2>Opret galleri</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="base" id="baseURL" value="<?=Router::$BASE?>">
            <?=Token::createTokenInput();?>
            <small>Felter med <em>* </em> skal udfyldes</small>
            <div class="input-field">
                <label for="albumTitle">Galleri Titel</label>
                <input type="text" name="albumTitle" id="albumTitle" placeholder="Galleri titel" value="<?=$POST['albumTitle'] ?? null?>" required> *
            </div>   
            <?php
                if(isset($return['errors']['albumTitle']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['albumTitle']?></span>
            <?php
                }
            ?>
            <div class="btn-add">
                <span id="btnAddImages" class="btn-success">
                    Tilføj billeder
                </span>
                <input type="file" multiple name="images[]" id="imageInput">
            </div>
            <div class="file-area">
                
            </div>
            <button type="submit" name="btnGalleryCreate" class="btn btn-accent">Opret</button>
        </form>
</section>
<script src="<?=Router::$BASE?>assets/js/admin/galleryUpload.js"></script>