<div class="container">
<section id="gallariesView">
    <h2>Galleri</h2>
    <?php
    $galleryData = View::CallModel()->GetAlbums();
    if(sizeof($galleryData) > 0)
    {
    ?>
    <div class="gallery-grid">
    <?php
        foreach($galleryData as $album)
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
    <?php
    }
    else
    {
    ?>
    <h3>Der er ikke nogle gallerier at vise.</h3>
    <?php
    }
    ?>
</section>
</div>