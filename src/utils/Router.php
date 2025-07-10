<?php

namespace App\Utils;

class Router
{
    private $routes = [];

    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove trailing slash except for root
        if ($path !== '/' && substr($path, -1) === '/') {
            $path = substr($path, 0, -1);
        }

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];

            if (is_callable($handler)) {
                call_user_func($handler);
            } elseif (is_string($handler)) {
                $this->handleControllerAction($handler);
            }
        } else {
            $this->handle404();
        }
    }

    private function handleControllerAction($handler)
    {
        list($controller, $action) = explode('@', $handler);
        $controllerClass = "App\\Controllers\\{$controller}";

        if (class_exists($controllerClass)) {
            $instance = new $controllerClass();
            if (method_exists($instance, $action)) {
                $instance->$action();
            } else {
                $this->handle404();
            }
        } else {
            $this->handle404();
        }
    }

    private function handle404()
    {
        // Redirect to home page instead of showing 404
        header('Location: /', true, 302);
        exit;
    }
}
