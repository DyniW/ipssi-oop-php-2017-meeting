<?php

declare(strict_types=1);

namespace Meeting\Controller;

use Application\Controller\ErrorController;
use Meeting\Exception\MeetingsNotFoundException;
use Meeting\Repository\MeetingsRepository;

final class ShowMeetingsController
{
    /**
     * @var MeetingsRepository
     */
    private $meetingsRepository;

    public function __construct(meetingsRepository $meetingsRepository)
    {
        $this->meetingsRepository = $meetingsRepository;
    }

    public function indexAction() : string
    {
        try {
            $meetings = $this->meetingsRepository->get($_GET['name'] ?? '');

            ob_start();
            include __DIR__.'/../../../views/meetings-details.phtml';
            return ob_get_clean();
        } catch (MeetingsNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
