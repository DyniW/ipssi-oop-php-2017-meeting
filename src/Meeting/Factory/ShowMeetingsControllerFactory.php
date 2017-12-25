<?php

declare(strict_types=1);

namespace Meeting\Factory;

use Meeting\Controller\ShowMeetingsController;
use Meeting\Repository\MeetingsRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingsControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingsController
    {
        $meetingsRepository = $container->get(MeetingsRepository::class);

        return new ShowMeetingsController($meetingsRepository);
    }
}
