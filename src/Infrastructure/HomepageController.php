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
        $products = [
            [
                'name' => 'Nike Flyknit Trainer',
                'price' => '€150,-',
                'image' => 'https://pbs.twimg.com/media/DFmNkjvU0AAYixV.jpg',
                'release_date' => '24/07/2018',
            ],
            [
                'name' => 'Nike Air Max 93',
                'price' => '€145,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/zwnqu2emjltkspwxjcvs/air-max-93-herenschoen-CJ5htx.jpg',
                'release_date' => '27/07/2018',
            ],
            [
                'name' => 'Nike Air Max 97 Ultra',
                'price' => '€180,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/nnlbjfn53g8az6bqcwde/air-max-97-ultra-17-herenschoen-KlJ5C8.jpg',
                'release_date' => '16/08/2018',
            ],
            [
                'name' => 'Nike Air Max 1',
                'price' => '€135,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/rvowiaueoo9b6pev3vjd/air-max-1-herenschoen-GjP8rz.jpg',
                'release_date' => '06/09/2018',
            ],
            [
                'name' => 'Nike Air Max 270',
                'price' => '€150,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/sjsdbrifujzaic1imvg8/air-max-270-flyknit-herenschoen-1ld5NV.jpg',
                'release_date' => '13/09/2018',
            ],
            [
                'name' => 'Nike Air Max 90',
                'price' => '€140,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/dd5xjngvnsmuc81xawgv/air-max-90-herenschoen-fZs9lt.jpg',
                'release_date' => '17/09/2018',
            ],
            [
                'name' => 'Nike Air Max 95',
                'price' => '€180,-',
                'image' => 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/fdzahwprexmkepaucuhm/air-max-95-herenschoen-t2DTvw.jpg',
                'release_date' => '22/09/2018',
            ]
        ];

        return new HtmlResponse($this->templateRenderer->render('Homepage.twig', [
            'products' => $products,
        ]));
    }
}
