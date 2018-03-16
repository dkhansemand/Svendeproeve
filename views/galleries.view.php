<section id="gallariesView">
    <h2>Galleri</h2>
    <div class="gallery-grid">
    <?php
        foreach(View::CallModel()->GetAlbums() as $album)
        {
    ?>
            <div class="album">
                <a href="<?=Router::Link('/Galleri/Album/'.$album->albumId)?>">
                    <img src="<?=Router::$BASE?>assets/media/<?=$album->filepath.'/'.$album->filename?>" alt="<?= empty($album->eventTitle) ? $album->albumName : $album->eventTitle ?>">
                    <span class="album-title"><?= empty($album->eventTitle) ? $album->albumName : $album->eventTitle ?></span>
                </a>
            </div>
    <?php
        }
    ?>
    </div>
</section>