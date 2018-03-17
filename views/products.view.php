<h1>Bådpark</h1>
<section id="productsView">
    <div class="product-header">
        <div class="th-1">Type:</div>
        <div class="th-2">Sværhedsgrad:</div>
        <div class="th-3">Antal:</div>
        <div class="th-4"></div>
        <div class="th-5">TIl salg:</div>
    </div>
    <?php
        $types = [];
        foreach(View::CallModel()->GetAllProducts() as $product)
        {
            
                $types[$product->kajakTypeName][] = [
                    'name' => $product->kajakName,
                    'level' => $product->kajakTypeLevel,
                    'stock' => $product->kajakStock,
                    'image' => Router::$BASE.'assets/media/'. $product->filename,
                    'sale' => $product->salesPrice
                ];
            
        }

        foreach($types as $typeName => $products)
        {
    ?>
            <div class="product-row">
                <h3><?=$typeName?></h3>
    <?php
            foreach($products as $product)
            {
    ?>
                <div class="product-info">
                    <span><?=$product['name']?></span>
                    <span class="th-1-mobile"></span>
                    <span class="th-2-mobile">Sværhedsgrad:</span>
                    <span><?=$product['level']?></span>
                    <span class="th-3-mobile">Antal:</span>
                    <span><?=$product['stock']?></span>
                    <span class="th-4-mobile"></span>
                    <span><img src="<?=$product['image']?>" alt="?=$product['name']?>"></span>
                    <span class="th-5-mobile">Til salg:</span>
                    <span><?=!is_null($product['sale']) ? number_format($product['sale'], 0, ',', '.') . ' DKK' : '' ?></span>
                </div>
    <?php
            }
    ?>
            </div>
    <?php
        }
    ?>
    <?php
        echo '<pre>',var_dump($types),'</pre>';
    ?>
</section>