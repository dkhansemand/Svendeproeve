<?php
Router::SetViewFoler(__ROOT__ . DS . 'views' . DS);
Router::SetDefaultRoute('/Om-Klubben');
Router::SetErrorPath('/Fejl');
const ROUTES = array(
                    [
                        'path' => '/Om-Klubben',
                        'controller' => 'AboutController',
                        'model' => 'About.model',
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
                        'view' => 'events.view.php',
                        'params' => ['ACTION', 'ID']
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
                        'model' => 'Profile.model',
                        'view' => 'profile.view.php',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Kontakt',
                        'controller' => 'ContactController',
                        'model' => 'Contact.model',
                        'view' => 'contact.view.php'
                    ],
                    [
                        'path' => '/Soening',
                        'controller' => 'SearchController',
                        'model' => 'Search.model',
                        'view' => 'search.view.php'
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
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Arrangementer',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'events.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Arrangement/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'create.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_EVENT_CREATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Arrangement/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'edit.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_EVENT_UPDATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Arrangement/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'events'.DS.'delete.view.php',
                        'controller' => 'EventsController',
                        'model' => 'Events.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_EVENT_DELETE
                        ]
                    ],
                    [
                        'path' => '/Admin/Galleri',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'albums.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Galleri/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'create.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_GALLERY_CREATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Galleri/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'edit.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_GALLERY_UPDATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Galleri/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'gallery'.DS.'delete.view.php',
                        'controller' => 'GalleryController',
                        'model' => 'Gallery.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_GALLERY_DELETE
                        ]
                    ],
                    [
                        'path' => '/Admin/Nyheder',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'news.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Nyheder/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'create.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_NEWS_CREATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Nyheder/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'edit.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_NEWS_UPDATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Nyheder/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'news'.DS.'delete.view.php',
                        'controller' => 'NewsController',
                        'model' => 'news.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_NEWS_DELETE
                        ]
                    ],
                    [
                        'path' => '/Admin/Baadpark',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'products.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Baadpark/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'create.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_CREATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Baadpark/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'edit.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_UPDATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Baadpark/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'products'.DS.'delete.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_DELETE
                        ]
                    ],
                    [
                        'path' => '/Admin/Kajaktyper',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'productTypes.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Opret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'create.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_CREATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Ret',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'edit.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_UPDATE
                        ]
                    ],
                    [
                        'path' => '/Admin/Kajaktype/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'productTypes'.DS.'delete.view.php',
                        'controller' => 'ProductsController',
                        'model' => 'Product.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_PRODUCT_DELETE
                        ]
                    ],
                    [
                        'path' => '/Admin/Beskeder',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'messages'.DS.'messages.view.php',
                        'controller' => 'ContactController',
                        'model' => 'Contact.model',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Besked/Slet',
                        'layout' => 'admin',
                        'view' => 'admin'.DS.'messages'.DS.'delete.view.php',
                        'controller' => 'ContactController',
                        'model' => 'Contact.model',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Min-Side',
                        'layout' => 'admin',
                        'controller' => 'ProfileController',
                        'model' => 'Profile.model',
                        'view' => 'admin'.DS.'profile.view.php',
                        'permissions' => []
                    ],
                    [
                        'path' => '/Admin/Medlemmer',
                        'layout' => 'admin',
                        'controller' => 'MembersController',
                        'model' => 'Members.model',
                        'view' => 'admin'.DS.'members'.DS.'members.view.php',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/Admin/Medlem/Opret',
                        'layout' => 'admin',
                        'controller' => 'MembersController',
                        'model' => 'Members.model',
                        'view' => 'admin'.DS.'members'.DS.'create.view.php',
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_CREATE_USER
                        ]
                    ],
                    [
                        'path' => '/Admin/Medlem/Ret',
                        'layout' => 'admin',
                        'controller' => 'MembersController',
                        'model' => 'Members.model',
                        'view' => 'admin'.DS.'members'.DS.'edit.view.php',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_UPDATE_USER
                        ]
                    ],
                    [
                        'path' => '/Admin/Medlem/Slet',
                        'layout' => 'admin',
                        'controller' => 'MembersController',
                        'model' => 'Members.model',
                        'view' => 'admin'.DS.'members'.DS.'delete.view.php',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS,
                            Permission::PERM_ADMIN_DELETE_USER
                        ]
                    ],
                    [
                        'path' => '/Admin/Nyhedsbrev',
                        'layout' => 'admin',
                        'model' => 'newsletter.model',
                        'view' => 'admin'.DS.'newsletter.view.php',
                        'params' => ['ID'],
                        'permissions' => [
                            Permission::PERM_ADMIN_PANEL_ACCESS
                        ]
                    ],
                    [
                        'path' => '/api/Gallery/Delete',
                        'layout' => 'api',
                        'view' => 'api'.DS.'gallery.view.php',
                        'model' => 'Gallery.model'
                    ],
                    [
                        'path' => '/api/Newsletter',
                        'layout' => 'api',
                        'view' => 'api'.DS.'newsletter.view.php',
                        'model' => 'newsletter.model'
                    ]
                );
