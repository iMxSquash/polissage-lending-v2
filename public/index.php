<?php
require_once __DIR__ . '/../src/config/bootstrap.php';

use App\Utils\Router;

$router = new Router();

// Define routes
$router->get('/', 'HomeController@index');
$router->post('/contact', 'ContactController@handleContact');

// Dispatch the request
$router->dispatch();
