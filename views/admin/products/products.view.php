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
            $products = View::CallModel()->GetAllProducts();
            if(sizeof($products) > 0)
            {
                foreach($products as $product)
                {    
            ?>
                <tr>
                    <td><?=$product->kajakName?></td>
                    <td><?=$product->kajakTypeName?></td>
                    <td><?=$product->kajakTypeLevel?></td>
                    <td><?=$product->kajakStock?></td>
                    <td><img src="<?=Router::$BASE?>assets/media/<?=$product->filepath.'/'.$product->filename?>" alt=""></td>
                    <td><?= !empty($product->salesPrice) ? $product->salesPrice : 'Ikke til salg'?></td>
                    <td>
                        <a href="<?=Router::Link('/Admin/Baadpark/Ret/'.$product->kajakId)?>" class="btn-success">Ret</a>
                        <a href="<?=Router::Link('/Admin/Baadpark/Slet/'.$product->kajakId)?>" class="btn-error">Slet</a>
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