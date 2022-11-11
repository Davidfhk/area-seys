<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects;

final class ConcertGroupsId
{
    private $value;

    public function __construct(array $groupsId)
    {
        $this->value = $groupsId;
    }

    public function value(): int
    {
        return $this->value;
    }
}