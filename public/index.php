<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pizzaria\App\HtmlMetadata;
use Pizzaria\App\Router;

$uri = substr($_SERVER['REQUEST_URI'], 1);

$router = new Router();
$path = $router->run($uri);
$html = file_get_contents($path);

$htmlHandler = new HtmlMetadata($html, $uri);
echo $htmlHandler->renderCss()->saveHTML();

