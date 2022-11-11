<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects;

final class ConcertPromoterId
{
    private $value;

    public function __construct(int $id)
    {
        $this->value = $id;
    }

    public function value(): int
    {
        return $this->value;
    }
}