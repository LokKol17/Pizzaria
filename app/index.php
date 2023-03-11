<?php 

$routes = require __DIR__ . '/routes.php';
$page = $_GET['page'] ?? 'homepage';

if (array_key_exists($page, $routes)) {
    $controller = new $routes[$page];
    $controller->execute();
} else {
    echo '404';
}

