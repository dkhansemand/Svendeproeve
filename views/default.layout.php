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
            <nav>
                <a href="">Om Klubben</a>
                <a href="">Nyheder</a>
                <a href="">Arrangementer</a>
                <a href="">Galleri</a>
                <a href="">Bådpark</a>
                <a href="">Bliv Medlem</a>
                <a href="">Min Side</a>
                <a href="">Kontakt</a>
            </nav>
        </header>
        <main>
            <?php
                require_once View::Render();
            ?>
        </main>
        <footer>

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
