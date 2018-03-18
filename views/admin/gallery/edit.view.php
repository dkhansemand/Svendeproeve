<?php
    $albumId = (int)Router::GetParamByName('ID');
    if(isset($POST['btnGalleryEdit']))
    {
        $return = View::UseController()->EditGallery($POST, 'images', $POST['_once_default'], $albumId);
        //var_dump($POST);
        if(isset($return['err']))
        {
            $success = 'Der skete en fejl! <br> ' . ($return['token'] ?? $return['function'] ?? $return['insert'] ?? null);
        }elseif($return === true)
        {
            $success = 'Galleriet er nu blevet rettet';
            unset($POST);
        }
    }
    //echo 'POST<pre>',var_dump($POST), ' | FILES ', var_dump($_FILES), '</pre>';

    $galleryData = View::CallModel()->GetGalleryByAlbumId($albumId);
?>
<div class="container">
<section id="galleryView">
    <h2>Ret galleri</h2>
    <?= isset($success) ? '<h3>'.$success.'</h3>' : ''; ?>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="baseURL" id="baseURL" value="<?=Router::$BASE?>">
            <?=Token::createTokenInput();?>
            <small>Felter med <em>* </em> skal udfyldes</small>
            <div class="input-field">
                <label for="albumTitle">Galleri Titel</label>
                <input type="text" name="albumTitle" id="albumTitle" placeholder="Galleri titel" value="<?=$POST['albumTitle'] ?? $galleryData[0]->albumName ?? null?>" required> *
            </div>   
            <?php
                if(isset($return['errors']['albumTitle']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['albumTitle']?></span>
            <?php
                }
            ?>
            <div class="input-field">
                <label for="event">Tilknyt til arrangement</label>
                <select name="event" id="event">
                    <option value="0">Vælg et arrangement</option>
                    <?php
                    foreach(View::CallModel()->GetEvents() as $event)
                    {
                ?>
                        <option value="<?=$event->eventsId?>" <?= (@$POST['event'] ?? $galleryData[0]->eventsId === $event->eventsId) ? 'selected' : ''?>><?=$event->eventTitle?></option>
                <?php
                    }
                ?>
                </select>
            </div>   
            <?php
                if(isset($return['errors']['event']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['event']?></span>
            <?php
                }
            ?>
            <div class="btn-add">
                <span id="btnAddImages" class="btn-success">
                    Tilføj billeder
                </span>
                <input type="file" multiple name="images[]" id="imageInput" accept=".jpg,.jpeg,.png,.gif">
            </div>
            <div class="progress-bar">
                <progress max="0" value="0"></progress>
                <span>Fil </span>
                <span id="currentFile">0</span>
                <span> af </span>
                <span id="filesCount">0</span>
                <span> indlæst </span>
            </div>
            <p>Vælg et billede til at være frontbillede</p>
            <?php
                if(isset($return['errors']['albumCover']))
                {
            ?>
                    <span class="err-msg">Fejl - <?=$return['errors']['albumCover']?></span>
            <?php
                }
            ?>
            <div id="uploadError">
                <span class="err-msg"></span>
            </div>
            <div class="file-area">
            <?php
            $albumCover = null;
                foreach($galleryData as $image)
                {
                    $albumCover = ($image->albumCoverId == $image->mediaId) ? $image->mediaId : null;
                    $filenameSplit = explode('_', $image->filename);
                    $thumbnail = (in_array('200x150', $filenameSplit)) ? $image->filename : null;
                    if(!is_null($thumbnail))
                    {
            ?>
                        <div class="gallery-img" style="<?=$image->albumCoverId == $image->mediaId ? 'border: 4px solid darkgreen' : ''?>">
                            <img src="<?=Router::$BASE?>assets/media/<?=$image->filepath.'/'.$thumbnail?>">
                            <input type="hidden" name="images[]" value="<?=$image->mediaId?>">
                            <span class="btn-remove btn-error">X</span>
                        </div>
            <?php
                    }
                }
            ?>
            </div>
            <input type="hidden" name="albumCover" id="albumCover" value="<?=$albumCover?>">
            <button type="submit" name="btnGalleryEdit" class="btn btn-accent">Ret</button>
        </form>
</section>
</div>
<script src="<?=Router::$BASE?>assets/js/admin/galleryUpload.js"></script>