<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'maxFiles' => 62
        ],

        // DB settings
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'politik',
            'username' => 'politik',
            'password' => 'L8CWMNNTuBjy7cL5',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];
