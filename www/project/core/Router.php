<?php
/**
 * Класс Router - роутер, реализующий статический метод getPage($routes, $uri).
 * На вход в виде параметров подаются строка запроса пользователя ($uri) и настройки роутинга ($routes)
 * из файла /project/config/routes.php.
 * Возвращает результат метода соответсвующего контроллера, в обратном случае возвращает объект класса Page
 * с параметрами вывода страницы ошибки.
 */

namespace project\core;

class Router
{
    public static function getPage($routes, $uri)
    {
        foreach ($routes as $route) {
            $pattern = self::createPattern($route->path);
            if (preg_match($pattern, $uri, $params)) {
                $parameter = $params[1] ?? 1;
                $className = "Project\\Controllers\\$route->controller";
                $controller = new $className();
                $action = $route->action;
                return $controller->$action($parameter);
            }

        }
        return new Page('error.php', '404', 'This page not found. Check the address.', '');
    }

    private static function createPattern($path)
    {
        $path = str_replace(".", "\.", $path);
        $path = str_replace("?", "\?", $path);
        return "#^/" . preg_replace("(<[A-Z]{1,2}>)", "([0-9]+)", $path) . "$#";
    }
}

