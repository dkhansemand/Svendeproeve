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
                        'model' => 'news.model',
                        'params' => ['PAGE'],
                        'view' => 'news.view.php'
                    ],
                    [
                        'path' => '/Nyhed',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'params' => ['ARTICLE'],
                        'view' => 'article.view.php'
                    ],
                    [
                        'path' => '/Arrangementer',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'view' => 'events.view.php'
                    ],
                    [
                        'path' => '/Galleri',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'view' => 'galleries.view.php'
                    ],
                    [
                        'path' => '/Galleri/Album',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'view' => 'gallery.view.php',
                        'params' => ['ALBUM_ID']
                    ],
                    [
                        'path' => '/Baadpark',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
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
                        'controller' => 'LoginController',
                        'model' => 'login.model'
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
                        'path' => '/Admin/Arrangementer',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'events.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Arrangement/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'create.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Arrangement/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'edit.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Arrangement/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'delete.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Galleri',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'albums.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Galleri/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'create.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Galleri/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'edit.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Galleri/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'delete.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Nyheder',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'news.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Nyheder/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'create.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Nyheder/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'edit.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Nyheder/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'delete.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Baadpark',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'products.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Baadpark/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'create.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Baadpark/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'edit.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Baadpark/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'delete.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Kajaktyper',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'productTypes.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'create.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'edit.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'delete.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => []
                    ],
                    [
                        'path' => '/api/Gallery/Delete',
                        'layout' => 'api',
                        'view' => 'api'.DS.'gallery.view.php',
                        'model' => 'Gallery.model'
                    ]
                );
