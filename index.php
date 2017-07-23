<?php
require realpath(__DIR__) . '/vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require realpath(__DIR__) . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require realpath(__DIR__) . '/src/dependencies.php';

// Register middleware
require realpath(__DIR__) . '/src/middleware.php';

// Register routes
require realpath(__DIR__) . '/src/routes.php';

// get the app's di-container
$c = $app->getContainer();
$c['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $c['response']
            ->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withHeader('Content-type', 'text/html')
            ->write('Deve ser utilizado um método: ' . implode(', ', $methods));
    };
};

// Run app
$app->run();
