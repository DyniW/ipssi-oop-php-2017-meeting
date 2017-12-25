<?php

declare(strict_types=1);

namespace Meeting\Factory;

use Meeting\Controller\MeetingsController;
use Meeting\Repository\MeetingsRepository;
use Psr\Container\ContainerInterface;

final class MeetingsControllerFactory
{
    public function __invoke(ContainerInterface $container) : MeetingsController
    {
        $meetingsRepository = $container->get(MeetingsRepository::class);

        return new MeetingsController($meetingsRepository);
    }
}
