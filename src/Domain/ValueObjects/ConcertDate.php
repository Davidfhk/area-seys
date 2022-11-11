<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects;

final class ConcertDate
{
    private $value;

    public function __construct(string $date)
    {
        $this->value = $date;
    }

    public function value(): string
    {
        return $this->value;
    }
}