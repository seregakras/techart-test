<?php
/**
 * Класс Page предназначен для хранения информации о выводимой пользователю страницы.
 * $layout - имя шаблона страницы из каталога /project/views.
 * $title - заголовок страницы.
 * $result - содержимое, полученное из базы данных.
 */

namespace project\core;

class Page
{
    private $layout;
    private $title;
    private $result;

    public function __construct($layout, $title, $result)
    {
        $this->layout = $layout;
        $this->title = $title;
        $this->result = $result;
    }


    public function __get($property)
    {
        return $this->$property;
    }
}
