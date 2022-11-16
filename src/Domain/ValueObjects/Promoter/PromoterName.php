<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Promoter;

final class PromoterName
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