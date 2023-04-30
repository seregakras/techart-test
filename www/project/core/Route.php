<?php
/**
 * Объекты класса Route хранят информацию о соответствии пути обращения к ресурсу,
 * имени контроллера и его действии (роутинг). Создаются в файле /project/config/routes.php.
 * $path - путь к ресурсу.
 * $controller - имя контроллера, обрабатывающего обращение к ресурсу.
 * $action - метод контроллера, вызываемый при обработке обращения.
 */

namespace project\core;

class Route
{
    private $path;
    private $controller;
    private $action;


    public function __construct($path, $controller, $action)
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}


