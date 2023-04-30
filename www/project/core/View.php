<?php
/**
 * Класс View предназначен для формирования и вывода страницы с помощью метода render(Page $page), на вход которого
 * подается объект класса Page. Из него извлекаются данные, подключается соответствующий шаблон страницы с содержимым.
 */

namespace project\core;

class View
{
    public function render(Page $page)
    {
        $layout = $page->layout;
        $title = $page->title;
        $result = $page->result;
        return include "project/views/$layout";
    }
}