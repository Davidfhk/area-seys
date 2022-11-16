<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Concert;

final class ConcertDate
{
    private $value;

    public function __construct(string $date)
    {
        $this->value = date('Y-m-d',strtotime($date));
    }

    public function value(): string
    {
        return $this->value;
    }
}