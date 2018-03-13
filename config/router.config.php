<?php
Router::SetViewFoler(__ROOT__ . DS . 'views' . DS);
Router::SetDefaultRoute('/Om-klubben');
const ROUTES = array(
                    [
                        'path' => '/Om-klubben',
                        'controller' => 'HomeController',
                        'view' => 'Home.view.php'
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
                        'path' => '/Min-side',
                        'controller' => 'ProfileController',
                        'view' => 'profile.view.php'
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
                        'path' => '/Logout',
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
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Dashboard',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'dashboard.view.php',
                        'controller' => 'AdminController',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ]
                );