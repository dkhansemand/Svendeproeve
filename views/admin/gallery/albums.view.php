<section id="galleryView">
    <h2>Galleri</h2>
    <a href="<?=Router::Link('/Admin/Galleri/Opret')?>" class="btn-accent">Opret galleri</a>
    <div class="gallery-grid">
        <div class="album">
            <a href="<?=Router::Link('/Galleri/Album/1')?>">
                <img src="<?=Router::$BASE?>assets/media/kajak04.jpg" alt="">
                <span class="album-title">Titel der er super herre meget lang</span>
            </a>
            <span class="btn-actions">
                <a href="" class="btn-success">Ret</a>
                <a href="" class="btn-error">Slet</a>
            </span>
        </div>
    </div>
</section>