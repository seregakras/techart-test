<?php

use project\core\Router;
use project\core\View;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'project/core/Router.php';
require_once 'project/models/NewsModel.php';
require_once 'project/config/connect.php';
require_once 'project/config/view_config.php';
require_once 'project/core/Route.php';
require_once 'project/core/View.php';
require_once 'project/controllers/PageController.php';
require_once 'project/core/Page.php';
require_once 'project/core/Model.php';

$routes = require 'project/config/routes.php';
$page = Router::getPage($routes, $_SERVER['REQUEST_URI']);
(new View())->render($page);



