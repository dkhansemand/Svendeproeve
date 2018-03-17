<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kajakklubben Pagaj</title>
    <link rel="stylesheet" href="<?=Router::$BASE?>assets/css/style.css">
</head>
<body>
    <section class="grid">
        <header>
            <div id="topHeader">
                <h1>Kajakklubben Pagaj</h1>
            </div>
        </header>
        <main>
            <span>
                <nav>
                    <a href="<?=Router::Link('/Om-Klubben')?>" class="<?=Router::IsActive('/Om-Klubben', 'active')?>">Om Klubben</a>
                    <a href="<?=Router::Link('/Nyheder')?>" class="<?=Router::IsActive('/Nyheder', 'active')?>">Nyheder</a>
                    <a href="<?=Router::Link('/Arrangementer')?>" class="<?=Router::IsActive('/Arrangementer', 'active')?>">Arrangementer</a>
                    <a href="<?=Router::Link('/Galleri')?>" class="<?=Router::IsActive('/Galleri', 'active')?>">Galleri</a>
                    <a href="<?=Router::Link('/Baadpark')?>" class="<?=Router::IsActive('/Baadpark', 'active')?>">Bådpark</a>
                    <a href="<?=Router::Link('/Bliv-Medlem')?>" class="<?=Router::IsActive('/Bliv-Medlem', 'active')?>">Bliv Medlem</a>
                    <a href="<?=Router::Link('/Min-Side')?>" class="<?=Router::IsActive('/Min-Side', 'active')?>">Min Side</a>
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
                    Kajakklubben Pagaj
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
