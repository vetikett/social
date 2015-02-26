<?php namespace Core\BaseClasses;


class Route {

    static public function dynamic() {

        $uri = self::getRelativeUri($_SERVER['REQUEST_URI']);

        // Use HomeController if the uri is just the root. ex: "website.com/"
        if ( count($uri) == 1 ) {
            $controllerNamespace = "App\\Controllers\\HomeController";
            $controller = new $controllerNamespace();
            echo $controller->home();
        }

        // so you can do "website.com/users/show/1" where "1" will be
        // equal to "?id=1". ex "website.com/users/show?id=1".
        if ( count($uri) == 4 ) {
            if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
                $_POST['id'] = $uri[3];
                unset($uri[3]);
            }else{
                $_GET['id'] = $uri[3];
                unset($uri[3]);
            }
        }

        // The actual dynamic routing:
        // ex "website.com/users/show/1".
        // Here "users" will turn into "UsersController"
        // and "show" turn into the action on that controller.
        if ( (count($uri) == 3) ) {

            $controllerName = ucfirst($uri[1]) ."Controller";
            $controllerNamespace = "App\\Controllers\\".$controllerName;
            $action = $uri[2]."Action";

            if( is_readable("app/Controllers/". $controllerName .".php") ) {

                $controller = new $controllerNamespace();

                if ( method_exists($controller, $action) &&
                    $_SERVER['REQUEST_METHOD'] == "GET" &&
                    isset($_GET['id']))
                {

                    echo $controller->$action($_GET['id']);

                } elseif ( method_exists($controller, $action) && $_SERVER['REQUEST_METHOD'] == "GET") {

                    echo $controller->$action();

                } elseif ( method_exists($controller, $action) && $_SERVER['REQUEST_METHOD'] == "POST") {
                    if ( isset($_POST['id']) ) {
                        $controller->$action($_POST['id']);
                    }else{
                        $controller->$action();
                    }

                } else {
                    require_once '404.php';
                }
            }
        }

        if ( (count($uri) == 2) ) {

            $controllerName = ucfirst($uri[1]) . "Controller";
            $controllerNamespace = "App\\Controllers\\" . $controllerName;
            $action = "indexAction";

            if (is_readable("app/Controllers/" . $controllerName . ".php")) {

                $controller = new $controllerNamespace();

                if ( method_exists($controller, $action) && $_SERVER['REQUEST_METHOD'] == "GET") {

                    echo $controller->$action();

                }
            } else {
                require_once '404.php';
            }
        }

        if ( count($uri) > 4 ) {
            require_once '404.php';
        }
    }

    // Defines the root directory.
    static public function defineRootPath() {
        $relativeUrl = explode(DIRECTORY_SEPARATOR, getcwd());
        $root_path = array_pop($relativeUrl);
        define('ROOT_PATH', $root_path);
    }


    // Parses the URI so that the first URI directory is the root directory for this project.
    static private function getRelativeUri($rawUri) {
        $uri = explode("/", parse_url(trim(strtolower($rawUri), "/"), PHP_URL_PATH));

        foreach ($uri as $key => $uriPiece) {

            if ($uriPiece == ROOT_PATH) {
                break;
            }else {
                unset($uri[$key]);
            }
        }
        $uri = array_values($uri);

        return $uri;


    }


}