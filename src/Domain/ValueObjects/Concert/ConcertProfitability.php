<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Concert;

final class ConcertProfitability
{
    private $value;

    public function __construct(int $profitability)
    {
        $this->value = $profitability;
    }

    public function value(): int
    {
        return $this->value;
    }
}