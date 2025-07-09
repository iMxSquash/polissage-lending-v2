<?php
// Auto-detect environment
if (!defined('SRC_PATH')) {
    define('SRC_PATH', __DIR__ . '/../src');
}

// Simple autoloader for Render deployment
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = SRC_PATH . '/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Utils\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/demo', function () {
    readfile(__DIR__ . '/demo.html');
});
$router->get('/api/health', function () {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok', 'service' => 'php-web']);
});
$router->post('/contact', 'ContactController@handleContact');

$router->dispatch();
