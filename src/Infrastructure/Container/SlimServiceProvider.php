<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure\Container;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Container\ContainerInterface;

class SlimServiceProvider extends AbstractServiceProvider
{
    /** @var array */
    protected $provides = [
        'callableResolver',
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->add('callableResolver', function () use ($container) {
            return new class ($container) {
                /** @var ContainerInterface */
                private $container;

                public function __construct(ContainerInterface $container)
                {
                    $this->container = $container;
                }

                public function resolve(string $controller)
                {
                    list($controller, $method) = explode(':', "$controller:__invoke");

                    return [$this->container->get($controller), $method];
                }
            };
        });
    }
}
