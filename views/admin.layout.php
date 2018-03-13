<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Router | Now with MVC structure</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<h1>ADMIN</h1>
   <?php  
        require_once View::Render();
    
        if(@__DEBUG__ === true)
        {
            echo Debug::ExecuteTime();
        }
    ?>
</body>
</html>