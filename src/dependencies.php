<?php
// DIC configuration

$container = $app->getContainer();

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $stream = new Monolog\Handler\RotatingFileHandler($settings['path'], $settings['maxFiles'], Monolog\Logger::INFO);
    $stream->setFormatter(new Monolog\Formatter\HtmlFormatter());
    $logger->pushHandler($stream);

    return $logger;
};

// Service factory for the ORM
/*$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};*/

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) {
    return $capsule;
};

// Twig view render
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig($container['settings']['renderer']['template_path'], [
        'cache' => false
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

//View
// View Controller
$container[Controller\View\ViewCtrl::class] = function ($c) {
    return new Controller\View\ViewCtrl($c);
};