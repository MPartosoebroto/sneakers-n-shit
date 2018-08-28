<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;
use Zend\Diactoros\Response\HtmlResponse;

class HomepageController
{
    /** @var PDO */
    private $databaseConnection;

    /** @var Twig_Environment */
    private $templateRenderer;

    public function __construct(Twig_Environment $templateRenderer, PDO $databaseConnection)
    {
        $this->templateRenderer = $templateRenderer;
        $this->databaseConnection = $databaseConnection;
    }

    public function get(): ResponseInterface
    {
        return new HtmlResponse($this->templateRenderer->render('Homepage.twig', [
            'products' => $this->fetchShoesFromDatabase(),
        ]));
    }

    private function fetchShoesFromDatabase(): array {
        $statement = $this->databaseConnection->query('
            SELECT
              SHOE_NAME,
              PRICE,
              DATE_FORMAT(RELEASE_DATE, "%d/%m/%Y") as FORMATTED_RELEASE_DATE,
              shoe_images.IMAGE_URL
            FROM
              shoes
            LEFT JOIN shoe_images ON shoe_images.SHOE_ID = shoes.SHOE_ID
            ORDER BY RELEASE_DATE ASC
        ');

        $statement->execute();

        $shoes = [];

        while ($shoe = $statement->fetch()) {
            $shoes[] = [
                'name' => $shoe['SHOE_NAME'],
                'price' => '€' . number_format($shoe['PRICE']/100, 2),
                'image' => $shoe['IMAGE_URL'],
                'release_date' => $shoe['FORMATTED_RELEASE_DATE'],
            ];
        }

        return $shoes;
    }
}
