<section id="news">
    <h2>Bådpark</h2>
    <a href="<?=Router::Link('/Admin/Baadpark/Opret')?>" class="btn-accent">Opret ny båd</a>
    <table class="view-table">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Type</th>
                <th>Sværhedsgrad</th>
                <th>Antal</th>
                <th>&nbsp;</th>
                <th>Til salg</th>
                <th>Handling</th>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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