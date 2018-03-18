<div class="container">
<section id="aboutGrid">
    <section id="aboutContent">
        <h2>Om klubben</h2>
        
        <p>
            Velkommen til Kajakklubben Pagaj<br><br>
            Klubben blev stiftet i slutningen af 2015 og har lige siden oplevet en stor fremgang i medlemstallet.
            Vi lægger vægt på, at være en kajakklub for alle.
            Vi ønsker at skabe en god motionskultur og et godt fællesskab i klubben gennem hyggelige fællesture og sociale arrangementer.
        </p><br>
        <p>
            KKP ligger i Århus Havn. Går du fra Banegården, tager det cirka 10 minutter til fods at komme til kajakklubben.
            Århus Havn tilbyder perfekt rovand til begynderinstruktion og almindelige ture eller træning. Der er ingen store bølger i kanalen, hvilket gør det meget begyndervenligt.
        </p><br>
        <p>
            Vi glæder os til at se dig på vandet!
        </p>
    </section>
    <section id="usedProducts">
        <h2>Brugte kajakker</h2>
        <div class="products">
            <div class="product-item">
                <img src="./assets/media/kajak01.jpg" alt="" srcset="">
                <span class="product-info">
                    <p>navn</p>
                    <p>pris</p>
                </span>
            </div>
            <div class="product-item">
                <img src="./assets/media/kajak01.jpg" alt="" srcset="">
                <span class="product-info">
                    <p>navn</p>
                    <p>pris</p>
                </span>
            </div>
            <div class="product-item">
                <img src="./assets/media/kajak01.jpg" alt="" srcset="">
                <span class="product-info">
                    <p>navn</p>
                    <p>pris</p>
                </span>
            </div>
        </div>
    </section>
    <section id="aboutSidebar">
        <form action="<?=Router::Link('/Soening')?>" method="post">
            <input type="search" name="searchQuery" id="searchQuery" placeholder="Søg på sitet" required>
        </form>
        <article>
            <img src="./assets/media/kajak01.jpg" alt="" srcset="">
            <h3>Nyheder</h3>
            <span>
                <p>07/04 Nye kajakker til salg</p>
                <p>15/02 Pagaj-medlemmer vinder...</p>
            </span>
            <a href="" class="btn-accent">Nyheder &raquo;</a>
        </article>
        <article>
            <img src="./assets/media/kajak01.jpg" alt="" srcset="">
            <h3>2016</h3>
            <p>Juli</p>
            <p>04. Tur til Gudenåen</p>
            <p>08. Weekenden i det sydfranske øhav</p>
            <a href="" class="btn-accent">Kalender &raquo;</a>
        </article>
    </section>
</section>
</div>