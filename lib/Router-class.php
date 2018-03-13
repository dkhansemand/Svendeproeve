<?php

class Router extends Core
{
    public static   $BASE = null;
    private static  $DefaultRoute  = null,
                    $currentRoute = null,
                    $params = [],
                    $RouteIndex = null,
                    $Routes = null,
                    $controller = null,
                    $view = null,
                    $ViewFolder = null,
                    $REQ_ROUTE = null;

    public static function ValidateRoutes(array $routes, array $keys) : bool
    {
        $errors = 0;
        foreach($routes as $route)
        {
            if(!Helpers::array_key_exists_r($keys, $route))
            {
                $errors++;
            }
        }
        return ( $errors === 0 );
    }

    public static function SetViewFoler(string $viewfolder) : void
    {
        self::$ViewFolder = $viewfolder;
    }

    public static function GetViewFolder() : string
    {
        return self::$ViewFolder;
    }

    public static function SetDefaultRoute(string $route) : void
    {
        self::$DefaultRoute = $route;
    }

    public static function GetParamByName(string $param) : string
    {
        return rawurldecode(self::$params[$param]) ?? null;
    }

    public static function GetParamByIndex(int $index) : string
    {
        return rawurldecode(self::$params[$index]) ?? null;
    }

    public static function GetParams() : array
    {
        return self::$params ?? [];
    }

    public static function Redirect(string $location) : void
    {
        ob_start();
        header('Location:' . rtrim(self::$BASE, '/') . $location);
        exit;
    }

    public static function Init(string $url, array $routes) : void
    {
        if(self::ValidateRoutes($routes, ['path', 'view']))
        {
            self::$Routes = &$routes;
            $url = Filter::SanitizeURL($url);
            self::$BASE = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], "index.php"));
            self::$REQ_ROUTE = '/'.str_replace(strtolower(self::$BASE), '', strtolower($url));
            $newPath = explode('/', rtrim(self::$REQ_ROUTE, '/'));
            $newPath = array_splice($newPath, 1, count($newPath)-1);
            $routePath = [];
            $match = false;
            foreach(self::$Routes as $routeIdx => $route) 
            {
                $pathCount = count(explode('/', $route['path'])) -1;
                $params = [];
                $path = NULL;
                for($pCnt = 0; $pCnt < $pathCount; $pCnt++){
                    if(isset($newPath[$pCnt])) 
                    {
                        $path .= '/'.$newPath[$pCnt];
                    }
                }
                
                if(strtolower($route['path']) === strtolower($path))
                {
                    $routeExplode = explode('/', $route['path']);
                    $routePath[] = array_splice($routeExplode, 1, count($routeExplode)-1);
                    $counter = max($routePath);
                    $routingPath = NULL;
                    
                    for($x = 0; $x < sizeof($counter); $x++) 
                    {
                        $routingPath .= '/'.$counter[$x];
                    }

                    foreach(self::$Routes as $routeIndex => $singleRoute) 
                    {
                        if(strtolower($routingPath) === strtolower($singleRoute['path'])) 
                        {
                            self::$RouteIndex = $routeIndex;
                            $match = true;
                            $URLparams = array_slice($newPath, $x, count($newPath));
                            if(array_key_exists('params', $singleRoute) && sizeof($singleRoute['params']) > 0)
                            {
                                for($ParamCnt = 0; $ParamCnt < count($URLparams); $ParamCnt++)
                                {
                                    if(isset($singleRoute['params'][$ParamCnt]))
                                    {
                                        self::$params[$singleRoute['params'][$ParamCnt]] = $URLparams[$ParamCnt];
                                    }
                                    else
                                    {
                                        self::$params[] = $URLparams[$ParamCnt];
                                    }
                                }
                            }
                            else
                            {
                                self::$params = $URLparams;
                            }
                        }
                    }
                }
            }
                       

            if($match)
            {
                self::$currentRoute = self::$Routes[self::$RouteIndex]['path'];
                if(array_key_exists('controller', self::$Routes[self::$RouteIndex]))
                {
                    if(!self::CanLoadController(self::$Routes[self::$RouteIndex]['controller']))
                    {
                        throw new Exception("Cannot load controller '".self::$Routes[self::$RouteIndex]['controller']."'");
                    }
                }

                if(array_key_exists('layout', self::$Routes[self::$RouteIndex]))
                {
                    try
                    {
                        if(file_exists(self::$ViewFolder . self::$Routes[self::$RouteIndex]['layout'] . '.layout.php'))
                        {
                            self::$Layout = self::$Routes[self::$RouteIndex]['layout'] . '.layout.php';
                        }
                    }
                    catch(Exception $err)
                    {
                        throw new Exception("Cannot load layout '".self::$Routes[self::$RouteIndex]['layout']."'");
                    }
                }
                elseif(file_exists(self::$ViewFolder . 'default.layout.php'))
                {
                    self::$Layout = 'default.layout.php';
                }

                if(array_key_exists('view', self::$Routes[self::$RouteIndex]))
                {
                    if(!self::CanLoadView(self::$ViewFolder , self::$Routes[self::$RouteIndex]['view']))
                    {
                        throw new Exception("Cannot load view '". self::$ViewFolder . self::$Routes[self::$RouteIndex]['view']."'");
                    }
                }

                if(array_key_exists('permissions', self::$Routes[self::$RouteIndex]))
                {
                    (new Guard)->Protect(self::$Routes[self::$RouteIndex]['permissions'], self::$REQ_ROUTE);
                }
            }
            else
            {
                if(!empty(self::$DefaultRoute) && self::$REQ_ROUTE === '/')
                {
                    foreach(self::$Routes as $route)
                    {
                        if(self::$DefaultRoute === $route['path'])
                        {
                            self::Redirect($route['path']);
                        }
                    }
                }

                if(file_exists(self::$ViewFolder .'ErrorPages' . DS . '404.view.php'))
                {
                    (new FlashMessages)->error('Kunne ikke finde siden "'.self::$REQ_ROUTE.'"', null, true);
                    self::Redirect('/Error/404');
                }
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    exit;
                }
            }

            if(@__DEBUG__ === true)
            {
                echo 'BASE: <pre>',var_dump(self::$BASE), '</pre>';
                echo 'REQ_ROUTE<pre>',var_dump(self::$REQ_ROUTE), '</pre>';
                echo 'Routes: <pre>',var_dump(self::$DefaultRoute), '</pre>';
                echo 'Controller: <pre>',var_dump(self::$Controller), '</pre>';
                echo 'View: <pre>',var_dump(self::$ViewFolder . self::$View), '</pre>';
            }
        }
        else
        {
            throw new Exception('Routes not defined correctly!');
        }
    }

    public static function Link(string $link) : string
    {
        return self::$BASE . trim($link, '/');
    }

    public static function IsActive(string $route, string $activeCLass) : string
    {
        return strtolower($route) === strtolower(self::$currentRoute) ? $activeCLass : '';
    } 
}
