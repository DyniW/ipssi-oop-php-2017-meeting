<?php

declare(strict_types=1);

namespace Meeting\Entity;


class Users
{
    /**
     * @var string
     */
    private $Name;

    public function __construct(string $Name)
    {
        $this->Name = $Name;
    }

    public function getName(): string
    {
        return $this->Name;
    }
}