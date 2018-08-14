<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure;

use Psr\Http\Message\ResponseInterface;
use Twig_Environment;
use Zend\Diactoros\Response\HtmlResponse;

class HomepageController
{
    /** @var Twig_Environment */
    private $templateRenderer;

    public function __construct(Twig_Environment $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function get(): ResponseInterface
    {
        return new HtmlResponse($this->templateRenderer->render('Homepage.twig'));
    }
}
