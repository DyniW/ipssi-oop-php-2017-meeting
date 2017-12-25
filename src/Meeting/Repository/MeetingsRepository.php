<?php

declare(strict_types=1);

namespace Meeting\Repository;

use Meeting\Collection\MeetingsCollection;
use Meeting\Entity\Meetings;
use Meeting\Exception\MeetingsNotFoundException;
use PDO;

final class MeetingsRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll() : MeetingsCollection
    {
        $result = $this->pdo->query('SELECT id, title FROM Meeting');
        $Meeting = [];
        while ($Meetings = $result->fetch()) {
            $Meeting[] = new Meetings($Meetings['title']);
        }
        return new MeetingsCollection(...$Meeting);
    }

    public function get(string $name) : Meetings
    {
        $statement = $this->pdo->prepare('SELECT id, title FROM Meeting WHERE title = :name');
        $statement->execute([':name' => $name]);
        $Meetings = $statement->fetch();
        if (!$Meetings) {
            throw new MeetingsNotFoundException();
        }
        return new Meetings($Meetings['title']);
    }
}
