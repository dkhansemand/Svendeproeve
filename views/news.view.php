<?php
    //$articles = View::CallModel()->GetAllArticlesByDate();
    setlocale(LC_ALL, "da_DK.UTF-8", "Danish_Denmark.1252", "danish_denmark", "danish", "dk_DK@euro");
    
?>
<h1>Nyheder</h1>
<section id="newsGrid">
    <?php
        foreach(View::CallModel()->GetAllArticlesByDate() as $article)
        {
    ?>
            <article>
                <h2><?=$article->newsTitle?></h2>
                <h4><?=(new DateTime($article->newsStartDate))->format('d. F - Y')?></h4>
                <p>
                    <?=htmlspecialchars_decode($article->newsContent)?>
                </p>
                <a href="">Læs mere...</a>
            </article>
    <?php
        }
    ?>
</section>