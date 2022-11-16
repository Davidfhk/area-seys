<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Concert;

final class ConcertViewers
{
    private $value;

    public function __construct(int $viewers)
    {
        $this->value = $viewers;
    }

    public function value(): int
    {
        return $this->value;
    }
}