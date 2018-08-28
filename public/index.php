<?php
declare(strict_types=1);

use League\Container\Container;
use Pattasoebroto\Infrastructure\Container\ControllerServiceProvider;
use Pattasoebroto\Infrastructure\Container\DatabaseServiceProvider;
use Pattasoebroto\Infrastructure\Container\SlimServiceProvider;
use Pattasoebroto\Infrastructure\Container\TemplateRendererServiceProvider;
use Pattasoebroto\Infrastructure\HomepageController;
use Slim\App;
use Slim\Container as SlimContainer;

include __DIR__ . '/../vendor/autoload.php';

define('ENVIRONMENT', $_SERVER['HTTP_HOST'] === 'marcel.devel.zone' ? 'development' : 'production');

$container = new Container();

$container->addServiceProvider(ControllerServiceProvider::class);
$container->addServiceProvider(DatabaseServiceProvider::class);
$container->addServiceProvider(SlimServiceProvider::class);
$container->addServiceProvider(TemplateRendererServiceProvider::class);

$slimContainer = new SlimContainer([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container->delegate($slimContainer);

$slim = new App($container);

$slim->get('/', HomepageController::class . ':get');

$slim->run();
