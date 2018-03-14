<?php
Router::SetViewFoler(__ROOT__ . DS . 'views' . DS);
Router::SetDefaultRoute('/Om-Klubben');
Router::SetErrorPath('/Fejl');
const ROUTES = array(
                    [
                        'path' => '/Om-Klubben',
                        'controller' => 'AboutController',
                        'view' => 'about.view.php'
                    ],
                    [
                        'path' => '/Nyheder',
                        'controller' => 'NewsController',
                        'params' => ['page'],
                        'view' => 'news.view.php'
                    ],
                    [
                        'path' => '/Arrangementer',
                        'controller' => 'EventsController',
                        'view' => 'events.view.php'
                    ],
                    [
                        'path' => '/Galleri',
                        'controller' => 'GalleryController',
                        'view' => 'gallery.view.php',
                        'params' => ['album', 'page']
                    ],
                    [
                        'path' => '/Baadpark',
                        'controller' => 'ProductsController',
                        'view' => 'products.view.php'
                    ],
                    [
                        'path' => '/Bliv-medlem',
                        'view' => 'member.view.php'
                    ],
                    [
                        'path' => '/Min-Side',
                        'controller' => 'ProfileController',
                        'view' => 'profile.view.php',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Kontakt',
                        'controller' => 'ContactController',
                        'view' => 'contact.view.php'
                    ],
                    [
                        'path' => '/Login',
                        'view' => 'Login.view.php',
                        'controller' => 'LoginController'
                    ],
                    [
                        'path' => '/Logud',
                        'view' => 'logout.php'
                    ],
                    [
                        'path' => '/Fejl',
                        'params' => ['ERROR_ID'],
                        'view' => 'error.view.php'
                    ],
                    [
                        'path' => '/Admin',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'dashboard.view.php',
                        'controller' => 'AdminController',
                        'permissions' => [
                            
                        ]
                    ],
                    [
                        'path' => '/Admin/Dashboard',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'dashboard.view.php',
                        'controller' => 'AdminController',
                        'permissions' => [
                            
                        ]
                    ]
                );
