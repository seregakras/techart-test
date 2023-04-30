<?php
/**
 * Контроллер PageController используется роутером класса Router.
 * Метод showNews($parameter) предназначен для постраничного вывода новостей, получает на вход номер выводимой страницы.
 * Метод showView($parameter) предназначен для вывода одной новости с определенным ID, заданным параметром $parameter.
 * Все методы возвращают объект класса Page с определенными полями (шаблон, заголовок, содержимое).
 */

namespace Project\Controllers;

use project\core\Page;
use Project\Models\NewsModel;

class PageController
{
    public function showNews($parameter): Page
    {
        $model = new NewsModel();
        $result = $model->findNews($parameter, NEWS_FOR_PAGE);
        $title = "Новости";
        $layout = 'news.php';
        return new Page($layout, $title, $result);
    }

    public function showView($parameter): Page
    {
        $model = new NewsModel();
        $result = $model->findView($parameter);
        $layout = 'view.php';
        $title = $result['title'];
        $content = $result['content'];
        return new Page($layout, $title, $result);
    }


}

