<?php
declare(strict_types=1);

namespace Pattasoebroto\Infrastructure\Container;

use League\Container\ServiceProvider\AbstractServiceProvider;
use PDO;

class DatabaseServiceProvider extends AbstractServiceProvider
{
    /** @var string[] */
    protected $provides = [
        PDO::class,
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->add(PDO::class, function (): PDO {
            $credentials = [
                'development' => [
                    'dsn' => 'mysql:host=marcel-database;dbname=pattasoebroto',
                    'user' => 'development_user',
                    'password' => 'development_password',
                ],
                'production' => [
                    'dsn' => 'mysql:host=127.0.0.1;dbname=' . getenv('DATABASE_NAME'),
                    'user' => getenv('DATABASE_USER'),
                    'password' => getenv('DATABASE_PASSWORD'),
                ]
            ];

            $envCredentials = $credentials[ENVIRONMENT];

            return new PDO(
                $envCredentials['dsn'],
                $envCredentials['user'],
                $envCredentials['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET TIME_ZONE = '+00:00'"
                ]
            );
        });
    }
}
