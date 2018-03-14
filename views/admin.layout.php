<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kajakklubben Pagaj | Administrationspanel</title>
    <link rel="stylesheet" href="<?=Router::$BASE?>assets/css/styleAdmin.css">
</head>
<body>
    <section class="grid">
        <header>
            <div id="topHeader">
                <h1>Kajakklubben Pagaj - Admin</h1>
            </div>
        </header>
        <main>
            <span>
                <nav>
                    <a href="<?=Router::Link('/')?>">Til forsiden</a>
                    <a href="<?=Router::Link('/Admin/Nyheder')?>" class="<?=Router::IsActive('/Admin/Nyheder', 'active')?>">Nyheder</a>
                    <a href="<?=Router::Link('/Admin/Arrangementer')?>" class="<?=Router::IsActive('/Admin/Arrangementer', 'active')?>">Arrangementer</a>
                    <a href="<?=Router::Link('/Admin/Galleri')?>" class="<?=Router::IsActive('/Admin/Galleri', 'active')?>">Galleri</a>
                    <a href="<?=Router::Link('/Admin/Bådpark')?>" class="<?=Router::IsActive('/Admin/Bådpark', 'active')?>">Bådpark</a>
                    <a href="<?=Router::Link('/Admin/Medlemmer')?>" class="<?=Router::IsActive('/Admin/Medlemmer', 'active')?>">Medlememr</a>
                    <a href="<?=Router::Link('/Admin/Min-Side')?>" class="<?=Router::IsActive('/Admin/Min-Side', 'active')?>">Min Side</a>
                    <a href="<?=Router::Link('/Admin/Beskeder')?>" class="<?=Router::IsActive('/Admin/Beskeder', 'active')?>">Beskeder (0)</a>
                    <a href="<?=Router::Link('/Admin/Nyhedsbrev')?>" class="<?=Router::IsActive('/Admin/Nyhedsbrev', 'active')?>">Nyhedsbrev</a>
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
