<?php

declare(strict_types=1);

namespace Meeting\Collection;

use Meeting\Entity\Meetings;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class MeetingsCollection extends IteratorIterator implements Iterator
{
    public function __construct(Meetings ...$meetings)
    {
        parent::__construct(new ArrayIterator($meetings));
    }

    public function current() : ?Meetings
    {
        return parent::current();
    }
}
