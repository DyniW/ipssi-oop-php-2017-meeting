<?php

declare(strict_types=1);

namespace Meeting\Factory;

use Meeting\Repository\MeetingsRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class MeetingsRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : MeetingsRepository
    {
        $pdo = $container->get(PDO::class);

        return new MeetingsRepository($pdo);
    }
}
