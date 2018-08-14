<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure\Container;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Twig\Loader\FilesystemLoader;

class TemplateRendererServiceProvider extends AbstractServiceProvider
{
    /** @var string[] */
    protected $provides = [
        \Twig_Environment::class
    ];

    /**
     * @return void
     */
    public function register()
    {
        $container = $this->getContainer();

        $container->add(\Twig_Environment::class, function (): \Twig_Environment {
            $templateLoader = new FilesystemLoader([__DIR__ . '/../../../templates']);

            return new \Twig_Environment($templateLoader);
        });
    }
}
