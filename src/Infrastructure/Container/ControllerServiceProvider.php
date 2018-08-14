<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure\Container;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Pattasoebroto\Infrastructure\HomepageController;

class ControllerServiceProvider extends AbstractServiceProvider
{
    /** @var string[] */
    protected $provides = [
        HomepageController::class,
    ];

    /**
     * @return void
     */
    public function register()
    {
        $container = $this->getContainer();

        $container->add(HomepageController::class, function () use ($container): HomepageController {
            $templateRenderer = $container->get(\Twig_Environment::class);

            return new HomepageController($templateRenderer);
        });
    }
}
