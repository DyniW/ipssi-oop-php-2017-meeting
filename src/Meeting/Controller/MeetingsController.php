<?php

declare(strict_types=1);

namespace Meeting\Controller;

use Meeting\Repository\MeetingsRepository;

final class MeetingsController
{
    /**
     * @var MeetingsRepository
     */
    private $meetingsRepository;

    public function __construct(MeetingsRepository $meetingsRepository)
    {
        $this->meetingsRepository = $meetingsRepository;
    }

    public function indexAction() : string
    {
        $meeting = $this->meetingsRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/meetings.phtml';
        return ob_get_clean();
    }
}
