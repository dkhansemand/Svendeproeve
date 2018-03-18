<div class="container">
<section id="galleryView">
    <h2>Galleri</h2>
    <a href="<?=Router::Link('/Admin/Galleri/Opret')?>" class="btn-accent">Opret galleri</a>
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
                <span class="btn-actions">
                    <a href="<?=Router::Link('/Admin/Galleri/Ret/'.$album->albumId)?>" class="btn-success">Ret</a>
                    <a href="<?=Router::Link('/Admin/Galleri/Slet/'.$album->albumId)?>" class="btn-error">Slet</a>
                </span>
            </div>
    <?php
        }
    ?>
    </div>
</section>
</div>