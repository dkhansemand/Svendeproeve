<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kajakkluben Pagaj</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <section class="grid">
        <header>
            <div id="topHeader">
                <h1>Kajakkluben Pagaj</h1>
            </div>
        </header>
        <main>
            <span>
                <nav>
                    <a href="<?=Router::Link('/Om-Klubben')?>">Om Klubben</a>
                    <a href="<?=Router::Link('/Nyheder')?>">Nyheder</a>
                    <a href="">Arrangementer</a>
                    <a href="">Galleri</a>
                    <a href="">Bådpark</a>
                    <a href="<?=Router::Link('/Bliv-Medlem')?>">Bliv Medlem</a>
                    <a href="">Min Side</a>
                    <a href="">Kontakt</a>
                </nav>
            </span>
            <?php
                require_once View::Render();
            ?>
        </main>
        <footer>
            <section>
                <p>
                    Kajakkluben Pagaj
                </p>
                <p>
                    Loremvej 4
                </p>
                <p>
                    tlf. 22 22 22 22
                </p>
                <p>
                    mail@adresse.dk
                </p>
            </section>
        </footer>
    </section>
   <?php  
    
        if(@__DEBUG__ === true)
        {
            echo Debug::ExecuteTime();
        }
    ?>
</body>
</html>
