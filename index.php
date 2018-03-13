<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'init.php';

    //ROUTES is served from router.config file
    Router::Init($_SERVER['REQUEST_URI'], ROUTES);
    
    require_once View::Layout();
