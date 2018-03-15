<?php
    $page = Router::GetParamByName('PAGE') ?? null;
    $currentPage = isset($page) ? $page : 1;
?>
<h1>Nyheder</h1>
<section id="newsGrid">
    <?php
    
        Pagination::Init(View::CallModel()->GetAllArticlesByDate());
        $articles = Pagination::Items($currentPage, 5);
        foreach($articles as $article)
        {
    ?>
            <article>
                <h2><?=$article->newsTitle?></h2>
                <h4><?=ucwords(strftime('%d. %B - %Y', strtotime($article->newsStartDate)))?></h4>
                <p>
                    <?=(strlen($article->newsContent) > 200) ? substr($article->newsContent, 0, 200) . ' ...' : htmlspecialchars_decode($article->newsContent) ?>
                </p>
                <a href="">Læs mere...</a>
            </article>
    <?php
        }
    ?>
    <div class="pages">
        <?php
            if($page > 1 && $page !== 1)
            {
        ?>
                <a href="<?=Router::Link('/Nyheder/'.($currentPage > 1 ? $currentPage-1 : 1))?>">Tidligere nyheder</a>
        <?php
            }
            if(sizeof($articles) >=5)
            {
        ?>
                <a href="<?=Router::Link('/Nyheder/'.($currentPage+1)) ?>" class="">Ældre nyheder</a>
        <?php 
            }
        ?>
    </div>
</section>