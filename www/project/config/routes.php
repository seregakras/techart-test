<?php
/**
 * Файл с настройками для роутинга.
 */

use project\core\Route;

return [
    new Route('news.php', 'PageController', 'showNews'),
    new Route('news.php?page=<N>', 'PageController', 'showNews'),
    new Route('view.php?id=<ID>', 'PageController', 'showView'),
];

