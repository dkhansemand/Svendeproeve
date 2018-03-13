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
            <h1>Kajakkluben Pagaj</h1>
            <nav>
                <a href="">Om os</a>
            </nav>
        </header>
        <main>

        </main>
        <footer>

        </footer>
    </section>
   <?php  
        require_once View::Render();
    
        if(@__DEBUG__ === true)
        {
            echo Debug::ExecuteTime();
        }
    ?>
</body>
</html>
