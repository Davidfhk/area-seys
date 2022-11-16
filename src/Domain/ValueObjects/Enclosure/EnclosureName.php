<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Enclosure;

final class EnclosureName
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