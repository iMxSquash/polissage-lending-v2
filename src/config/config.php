<?php
// Main configuration file

return [
    'app' => [
        'name' => 'Polissage Lending v2',
        'version' => '2.0.0',
        'environment' => 'development'
    ],
    'database' => [
        'host' => 'localhost',
        'name' => 'polissage_lending',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ],
    'paths' => [
        'python_executable' => 'python',
        'python_scripts' => ROOT_PATH . '/python'
    ]
];
