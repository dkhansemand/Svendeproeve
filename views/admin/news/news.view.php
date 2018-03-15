<section id="news">
    <h2>Nyheder</h2>
    <a href="<?=Router::Link('/Admin/Nyheder/Opret')?>" class="btn-accent">Opret nyhed</a>
    <table class="view-table">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Fra (dato)</th>
                <th>Til (dato)</th>
                <th>Handlinger</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $articles = View::CallModel()->GetAllArticles();
            if(sizeof($articles) > 0)
            {
                foreach($articles as $article)
                {    
            ?>
                <tr>
                    <td><?=$article->newsTitle?></td>
                    <td><?=$article->newsStartDate?></td>
                    <td><?=$article->newsEndDate?></td>
                    <td>
                        <a href="<?=Router::Link('/Admin/Nyheder/Ret/'.$article->newsId)?>" class="btn-success">Ret</a>
                        <a href="<?=Router::Link('/Admin/Nyheder/Slet/'.$article->newsId)?>" class="btn-error">Slet</a>
                    </td>
                </tr>
            <?php
                } 
            }else{
                ?>
                <tr>
                    <td>Der er ingen nyheder at vise</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>