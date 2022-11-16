<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Concert;

final class ConcertName
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}