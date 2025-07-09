<?php

namespace App\Utils;

class ViewRenderer
{
    public function render($view, $data = [])
    {
        extract($data);

        $viewPath = SRC_PATH . '/views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: {$view}");
        }

        include $viewPath;
    }

    public function renderComponent($component, $data = [])
    {
        extract($data);

        $componentPath = SRC_PATH . '/views/components/' . $component . '.php';

        if (!file_exists($componentPath)) {
            throw new \Exception("Component not found: {$component}");
        }

        include $componentPath;
    }
}
