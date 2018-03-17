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
        foreach(View::CallModel()->GetAllProducts() as $product)
        {
    ?>
            <div class="product-row">
                <h3><?=$product->kajakTypeName?></h3>
                <div class="product-info">
                    <span>produktnavn</span>
                    <span class="th-1-mobile"></span>
                    <span class="th-2-mobile">Sværhedsgrad:</span>
                    <span>11</span>
                    <span class="th-3-mobile">Antal:</span>
                    <span>antal</span>
                    <span class="th-4-mobile"></span>
                    <span><img src="//placehold.it/200x150" alt=""></span>
                    <span class="th-5-mobile">Til salg:</span>
                    <span>1.500 DKK</span>
                </div>
            </div>
    <?php
        }
    ?>
</section>