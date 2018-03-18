<?php
    $ArticleParts = explode('-', Router::GetParamByName('ARTICLE'));
    $ID = (int)$ArticleParts[count($ArticleParts)-1];
    $article = View::CallModel()->GetArticleById($ID);

?>
<div class="container">
<section id="newsGrid">
    <article>
        <h2>Nyhed '<?=$article->newsTitle?>'</h2>
        <h4><?=ucwords(strftime('%d. %B - %Y', strtotime($article->newsStartDate)))?></h4>
        <p>
            <?=htmlspecialchars_decode($article->newsContent) ?>
        </p>
    </article>
</section>
</div>