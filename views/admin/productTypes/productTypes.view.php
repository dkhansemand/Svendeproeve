<section id="news">
    <h2>BådTyper</h2>
    <a href="<?=Router::Link('/Admin/Baadtyper/Opret')?>" class="btn-accent">Opret ny type</a>
    <table class="view-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Sværhedsgrad</th>
                <th>Handling</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $types = View::CallModel()->GetAllTypes();
            if(sizeof($types) > 0)
            {
                foreach($types as $type)
                {    
            ?>
                <tr>
                    <td><?=$type->kajakTypeName?></td>
                    <td><?=$type->kajakTypeLevel?></td>
                    <td>
                        <a href="<?=Router::Link('/Admin/Baadtype/Ret/'.$type->kajakTypeId)?>" class="btn-success">Ret</a>
                        <a href="<?=Router::Link('/Admin/Baadtype/Slet/'.$type->kajakTypeId)?>" class="btn-error">Slet</a>
                    </td>
                </tr>
            <?php
                } 
            }else{
                ?>
                <tr>
                    <td>Der er ingen typer at vise</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>